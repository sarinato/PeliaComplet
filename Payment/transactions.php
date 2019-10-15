<?php
    require_once('config/db.php');
    require_once('lib/pdo_db.php');
    require_once('modules/Transaction.php');

    // instantiate customer
    $transaction = new Transaction();
    
    //  Get Customer
    $transactions = $transaction->getTransaction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>View Transaction</title>
</head>
<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-secondary">Customers</a>
            <a href="transactions.php" class="btn btn-primary">Transactions</a>
        </div>
        <hr>
        <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>                
            </thead>
            <tbody>
                <?php foreach($transactions as $c): ?>
                <tr>
                    <td><?php echo $c->id ?></td>
                    <td><?php echo $c->customer_id ?></td>
                    <td><?php echo $c->product ?></td>
                    <td><?php echo sprintf("%.2f",$c->amount / 100) ?></td>
                    <td><?php echo strtoupper($c->currency) ?></td>
                    <td><?php echo $c->status ?></td>
                    <td><?php echo $c->created_at ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="index.php">Pay Page</a></p>
    </div>
</body>
</html>