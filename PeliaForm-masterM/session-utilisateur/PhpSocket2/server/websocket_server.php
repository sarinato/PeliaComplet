<?php
session_start ();
set_time_limit(0);

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
require_once '../vendor/autoload.php';

class Chat implements MessageComponentInterface {
	protected $clients;
	protected $users;

	public function __construct() {
		
		$this->clients = new \SplObjectStorage;
	}

	public function onOpen(ConnectionInterface $conn) {
		
		$this->clients->attach($conn);
		$this->users[$conn->resourceId] = $conn;
	}

	public function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
		unset($this->users[$conn->resourceId]);
	}

	public function onMessage(ConnectionInterface $from,  $data) {
		$from_id = $from->resourceId;
		$data = json_decode($data);
		$type = $data->type;
		switch ($type) {
			case 'chat':
				 $room_selected = $data->sedeeer;
				$user_name = $data->user_name;
				$chat_msg = $data->chat_msg;
				$hourTime = $data->hourTime;				
				$response_from = "<li class='sent' style='color:#fff'>				
				<p class='walo'>
				<b>".$user_name.":</b> ".$chat_msg."<br>".$hourTime."
				</p>
				</li>";
				$response_to = "<li class='replies'>	
				<p>
				<b>".$user_name."</b>: ".$chat_msg."<br>".$hourTime."
				</p>
				</li>";
				// Output

				$from->send(json_encode(array("type"=>$type,"msg"=>$response_from,"room"=>$room_selected)));
				
				foreach($this->clients as $client)
				{
					if($from!=$client)
					{
						$client->send(json_encode(array("type"=>$type,"msg"=>$response_to,"room"=>$room_selected)));
					}
				}
				break;
		}
	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
	}
}

$server = IoServer::factory(
	new HttpServer(new WsServer(new Chat())),
	8080
);
$server->run();
?>