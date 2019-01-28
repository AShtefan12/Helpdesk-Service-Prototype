<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    @include('layouts.partials.favicon')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.MakeItAll = {
            userName: "{{ auth()->user()->name }}"
        }
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body>
    <div class="wrapper" id="app">

        @include('layouts.partials.sidebar')

        <main class="content" :class="{'on-call': onCall | showingCall}">
            @if(auth()->user()->isOperator())
                <call-nav></call-nav>
            @endif

            <div class="main-content">
                @yield('content')
            </div>
        </main>

        @if(auth()->user()->isOperator())
            @include('layouts.partials.createProblemModal')

            <call></call>
        @endif
    </div>

    <!-- Scripts -->
    <script>
        function clearModalData(){
            document.getElementById("type").value="";
            document.getElementById("problem").value="";
            document.getElementById("summary").value="";
            document.getElementById("description").value="";
            document.getElementById("sAllocation").value="";
            document.getElementById("problemType").innerHTML="";
            document.getElementById("newCallSwitch").checked=false;
        }
        //problemTypeChosen used in the function problemTypeFunction
        var problemTypeChosen;
        //problemTypeFunction used to add text boxes appropriate to the problem type which has been selected
        function problemTypeFunction() {
            problemTypeChosen=document.getElementById("type").value;
            if(problemTypeChosen == "Hardware"){
                document.getElementById("problemType").innerHTML="<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='serialNumber' placeholder='Enter Serial Number'>";
            }
            else if(problemTypeChosen == "Software"){
                document.getElementById("problemType").innerHTML ="<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='softwareName' placeholder='Enter Software Name'>"+
                    "<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='OS' placeholder='Enter Operating System'>"+
                    "<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='softwareVersion' placeholder='Enter Software Version'>";
            }
            else if(problemTypeChosen == "Other"){
                document.getElementById("problemType").innerHTML="<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='serialNumber' placeholder='Enter Serial Number'>" +
                    "<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='softwareName' placeholder='Enter Software Name'>"+
                    "<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='OS' placeholder='Enter Operating System'>"+
                    "<p style='padding-bottom: 1px'></p>"+
                    "<input class='form-control' type='text' id='softwareVersion' placeholder='Enter Software Version'>";
            }
            else
                document.getElementById("problemType").innerHTML="";
        }
    </script>

    @yield('scripts')
</body>
</html>
