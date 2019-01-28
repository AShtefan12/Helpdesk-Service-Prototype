@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="m-3" style="border: none">
                <h1>Dashboard -
                    <small class="text-muted">Welcome {{ Auth::user()->name }}</small>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card m-3">
                <div class="card-header">
                    My Recent Problems
                </div>

                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action"><b>XK100</b> Corrupt disk
                        drive</a>
                    <a href="#" class="list-group-item list-group-item-action"><b>XK101</b> Spooling error</a>
                    <a href="#" class="list-group-item list-group-item-action"><b>XK145</b> User login error</a>
                    <a href="#" class="list-group-item list-group-item-action"><b>XK188</b> Corrupt disk
                        drive</a>
                    <a href="#" class="list-group-item list-group-item-action"><b>XK189</b> Broken keyboard</a>
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
                        <canvas id="myChart2"></canvas>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <div class="row">
                            <h6 class="mt-md-0 mt-3 mb-2 text-muted m-1">Average Solve Time </h6>
                        </div>
                        <div class="row card m-1">

                            <h5 class="mb-2 text-muted text-center ">
                                <small>1 hour 36 minutes</small>
                            </h5>
                        </div>

                        <div class="row " style='height:263px'>
                            <h6 class="card-subtitle mb-2 text-muted m-1">Weekly Summary</h6>
                            <canvas id="myChart3" class="p-2 "></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
