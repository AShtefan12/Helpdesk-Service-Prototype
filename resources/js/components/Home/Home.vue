<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="m-3" style="border: none">
                    <h3>Dashboard -
                        <small class="text-muted">Welcome {{ name }}</small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row" v-if="name == 'Alice' || name == 'Bert'">
            <div class="col-md-6 col-sm-12">
                <div class="card m-3">
                    <div class="card-header">
                        My {{ name == 'Alice' ? 'Recent' : 'Current' }} Problems
                    </div>

                    <ul class="list-group list-group-flush">
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK100</b> Corrupt disk drive
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK101</b> Spooling error
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK145</b> User login error
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK189</b> Broken keyboard
                        </router-link>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" v-if="name == 'Alice'">
                <div class="card m-3">
                    <div class="card-header">
                        Specialist Workload
                    </div>

                    <ul class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"><b>Bert</b> 5 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Clara</b> 8 problems</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12" v-if="name == 'Bert'">
                <div class="card m-3">
                    <div class="card-header">
                        My Urgent Problems
                    </div>

                    <ul class="list-group list-group-flush">
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK202</b> Projector not working
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK205</b> Computer won't turn on
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK290</b> User login error
                        </router-link>
                        <router-link :to="{ name: 'problems' }" class="list-group-item list-group-item-action">
                            <b>XK300</b> Broken Monitor
                        </router-link>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row" v-else>
            <div class="col-md-6 col-sm-12">
                <div class="card m-3">
                    <div class="card-header">
                        Equipment
                    </div>

                    <ul class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"><b>Printer #175635</b> 23 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Printer #183222</b> 20 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Computer #200838</b> 18 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Computer #2129838</b> 13 problems</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card m-3">
                    <div class="card-header">
                        Software
                    </div>

                    <ul class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action"><b>Microsoft Word v2018</b> 51 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Chrome v70</b> 42 problems</a>
                        <a href="#" class="list-group-item list-group-item-action"><b>Microsoft PowerPoint v2018</b> 30 problems</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-3">

                    <div class="card-header">
                        Statistics
                    </div>

                    <div class="row p-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-md-2 mb-sm-4" style="max-height: 400px;">
                            <h6 class="mb-2 text-muted">Percentage of problems solved by</h6>
                            <canvas id="myChart1" class="p-1"></canvas>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-md-2 mb-sm-4">
                            <h6 class="mt-4 mt-md-0 mb-2 text-muted">Problems by type</h6>
                            <p class="text-muted">Outer Ring: Number of problems<br>Inner Ring: Average solve time</p>
                            <canvas id="myChart2"></canvas>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2" style="max-height: 400px;">
                            <h6 class="mt-4 mt-md-0 mb-2 text-muted">Weekly Summary</h6>
                            <canvas id="myChart3" class="p-1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            name() {
                return window.MakeItAll.userName
            }
        },

        mounted() {
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
                type: 'pie',
                data:  {
                    labels: ["Printing", "Hard Disk Crash", "Word Processing", "Log in error"],
                    datasets: [
                        {
                            label: "Percentage",
                            backgroundColor:[
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(244, 241, 66, 0.6)',
                                'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: 'rgb(255, 255, 255)',
                            data: [63, 37, 100, 17],
                        },
                        {
                            label: "Time",
                            backgroundColor:[
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(244, 241, 66, 0.6)',
                                'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: 'rgb(255, 255, 255)',
                            data: [150, 88, 30, 200],
                        }
                    ]
                },
                options:{
                    tooltips: {
                        callbacks: {
                            title: function(tooltipItem, data) {
                                return data['labels'][tooltipItem[0]['index']];
                            },
                            label: function(tooltipItem, data) {
                                if(tooltipItem.datasetIndex == 1) {
                                    let seconds = data['datasets'][1]['data'][tooltipItem['index']];
                                    let time = Math.floor(seconds / 60) == 0 ? '' : Math.floor(seconds / 60) + ' Hour' + (Math.floor(seconds / 60) == 1 ? ' ' : 's ')
                                    time += seconds % 60 == 0 ? '' : seconds % 60 + ' Minutes'
                                    return time
                                }

                                return data['datasets'][tooltipItem.datasetIndex]['data'][tooltipItem['index']];
                            }
                        }
                    }
                }
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
        }
    }
</script>