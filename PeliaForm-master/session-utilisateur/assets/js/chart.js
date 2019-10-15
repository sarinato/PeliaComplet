var X = 5267;
new Chart(document.getElementById("line-chart"), {

    type: 'bar',
    data: {
        labels: ["Lundi"],
        datasets: [{
            data: [20, 0],
            label: "Doliprane",
            borderColor: "#038dfe",
            fill: false,
            fontColor: '#000',
            backgroundColor: [
                'rgba(3, 141, 254, 1)',
                'rgba(3, 141, 254, 1)',
                'rgba(3, 141, 254, 1)',
                'rgba(3, 141, 254, 1)',
                'rgba(3, 141, 254, 1)'
            ],


        }, {
            data: [50],
            label: "Paracétamole",
            borderColor: "rgba(60, 186, 159, 1)",
            fill: false,
            backgroundColor: [
                'rgba(60, 186, 159, 1)',
                'rgba(60, 186, 159, 1)',
                'rgba(60, 186, 159, 1)',
                'rgba(60, 186, 159, 1)',
                'rgba(60, 186, 159, 1)'
            ],
        }, {
            data: [100],
            label: "Augmentin",
            borderColor: 'rgba(0, 0, 0, 1)',
            fill: false,
            backgroundColor: [
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
            ],
        }]
    },
    axisY: {
        interval: 10,
        suffix: "%"
    },
    toolTip: {
        shared: true
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Vorte Observance',
            fontSize: 20,
            fontColor: '#000',
        },
        legend: {
            labels: {
                fontSize: 16,
                fontFamily: "'Roboto', sans-serif",
                fontColor: '#000',
                fontStyle: '500'
            }
        },
        scales: {
            yAxes: [{

                ticks: {
                    min: 0,
                    max: 100,
                    callback: function (value) {
                        return value + "%"
                    },
                    fontSize: 16,
                    fontFamily: "'Roboto', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                },
                scaleLabel: {
                    display: true,
                    labelString: 'Percentage',
                },
            }],
            xAxes: [{
                    ticks: {
                        fontSize: 16,
                        fontFamily: "'Roboto', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500'
                    },
                },

            ]

        }
    }

});