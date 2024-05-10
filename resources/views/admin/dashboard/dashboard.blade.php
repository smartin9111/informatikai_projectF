@extends('frontend.frontend_dashboard')
@section('main')
<!DOCTYPE html>
<section style="margin-top: 130px;">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-8">>
    <h2 class="text-center mb-8"> Munkadíj kimutatás ügyfelenként </h2>
    <canvas id="myChart"></canvas>
    
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($vehicle_id) !!},
                datasets: [{
                    label: 'Munkadíj',
                    data: {!! json_encode($labor_fee) !!},
                    backgroundColor: 'rgba(169, 169, 169, 0.2)',
                borderColor: 'rgba(169, 169, 169, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Munkadíj'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jármű ID'
                        }
                    }
                },
                
            }
        });
    </script>
</div>

<div class="container mt-8">>
<h2 class="text-center mb-8"> Járművek száma ügyfelenként </h2>
<canvas id="partnersChart"></canvas>
<script>
    var ctx = document.getElementById('partnersChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($partners->pluck('name')) !!},
            datasets: [{
                label: 'Járművek száma',
                data: {!! json_encode($partners->map(function ($partner) {
                    return $partner->vehicles->count();
                })) !!},
                backgroundColor: 'rgba(200, 99, 132, 0.2)',
                borderColor: 'rgba(220, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Járművek száma'
                    },
                    
                    ticks: {
                        stepSize: 1, 
                        precision: 0,
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Ügyfél'
                    }
                }
            }
        }
    });
</script>


<script>
    var ctx = document.getElementById('partnersChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($partners->pluck('name')) !!},
            datasets: [{
                label: 'Number of Vehicles',
                data: {!! json_encode($partners->map(function ($partner) {
                    return $partner->vehicles->count();
                })) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Number of Offers',
                data: {!! json_encode($partners->map(function ($partner) {
                    return $partner->offers->count();
                })) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    },
                    ticks: {
                        stepSize: 1,
                        precision: 0,
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Partner Name'
                    }
                }
            }
        }
    });
</script>
</div>

<div class="container mt-8">>
<h2 style="text-align: center;"> Ajánlatok száma ügyfelenként </h2>
<canvas id="offersChart"></canvas>

<script>
    var offersCtx = document.getElementById('offersChart').getContext('2d');
    var offersChart = new Chart(offersCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($partners->pluck('name')) !!},
            datasets: [{
                label: 'Ajánlatok száma',
                data: {!! json_encode($partners->map(function ($partner) {
                    return $partner->offers->count();
                })) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Ajánlatok'
                    },
                    ticks: {
                        stepSize: 1,
                        precision: 0,
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Ügyfél'
                    }
                }
            }
        }
    });
</script>
</div>

<div class="container mt-8">>
<h2 style="text-align: center;"> Kiállított számlák száma ügyfelenként </h2>
<canvas id="completedOffersChart"></canvas>

<script>
    var completedOffersCtx = document.getElementById('completedOffersChart').getContext('2d');
    var completedOffersChart = new Chart(completedOffersCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($partners->pluck('name')) !!},
            datasets: [{
                label: 'Kiállított számlák száma',
                data: {!! json_encode($partners->map(function ($partner) {
                    return $partner->offers->whereNotNull('start_date')->whereNotNull('completion_date')->count();
                })) !!},
                backgroundColor: 'rgba(255, 130, 55, 0.2)',
                borderColor: 'rgba(255, 130, 55, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Számlák száma'
                    },
                    ticks: {
                        stepSize: 1,
                        precision: 0,
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Ügyfél'
                    }
                }
            }
        }
    });
</script>
</div>

</body>
</section>
</html>
@endsection