
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body>

<div class="container">




    <div class="col-12">
        <div class = "card m-3" style = "border: none">
            <h1>Dashboard - <small class="text-muted">Welcome Alice</small></h1>
        </div>
    </div>

    <div class="col-6">
        <div class="card m-3 ">

            <div class="card-header">
                My Recent Problems
            </div>

            <div class = "row">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"><b>XK100</b> Corrupt disk drive</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>XK101</b> Spooling error</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>XK145</b> User login error</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>XK188</b> Corrupt disk drive</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>XK189</b> Broken keyboard</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
    <div class="card m-3"style = 'width:1048px'>

        <div class="card-header">
            Statistics
        </div>

        <div class = "row p-3" style = 'height:365px'>

            <div class="col">
                <h6 class="card-subtitle mb-2 text-muted">Percentage of problems solved by</h6>
                <canvas id="myChart1" class="p-1"></canvas>
            </div>

            <div class="col">
                <h6 class="card-subtitle mb-2 text-muted">Problems by type</h6>

                <canvas id="myChart2"></canvas>
            </div>

            <div class="col">

                <div class="row">
                    <h6 class="card-subtitle mb-2 text-muted">Average Solve Time </h6>


                </div>
                <div class="row card m-1">

                    <h5 class="mb-2 text-muted text-center "><small>1 hour 36 minutes</small></h5>

                </div>

                <div class="row " style = 'height:263px'>
                    <h6 class="card-subtitle mb-2 text-muted m-1">Weekly Summary</h6>
                    <canvas id="myChart3" class="p-2 "></canvas>
                </div>

            </div>

    </div>


    </div>
    </div>
    </div>
</div>





</body>

<script>

    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var ctx3 = document.getElementById('myChart3').getContext('2d');

    var chart = new Chart(ctx1, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ["Operators", "Specialists"],
            datasets: [{
                label: "Percentage",
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)'
                    ],
                borderColor: 'rgb(255, 255, 255)',
                data: [63, 37],
            }
            ]
        },

        // Configuration options go here
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var myDoughnutChart = new Chart(ctx2, {
        type: 'doughnut',
        data:  {
            labels: ["Printing", "Hard Disk Crash", "Word Processing", "Log in error"],
            datasets: [{
                label: "Percentage",
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(244, 241, 66, 0.6)',
                    'rgba(255, 159, 64, 0.6)'

                ],
                borderColor: 'rgb(255, 255, 255)',
                data: [63, 37, 100, 17],
            }
            ]
        },
        options:[{
            responsive: true,
            maintainAspectRatio: false
        }
        ]
    });

    var chart = new Chart(ctx3, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ["Open", "Closed"],
            datasets: [{
                label: "",
                backgroundColor:[
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: 'rgb(255, 255, 255)',
                data: [63, 37],
            }
            ]
        },

        // Configuration options go here
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>
</html>