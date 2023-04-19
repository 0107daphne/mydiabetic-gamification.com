<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'MyDiabetics') }}
        --}}@yield('title', 'MyDiabetic')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/app1.js') }}" defer></script>


    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') }}"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/progress-bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- FavIcon -->
    <link rel="icon" href="{{ asset('img/favicon_io/favicon.ico') }}" type="image/gif" sizes="16x16">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="md-brand text-center">MyDiabetic</h3>
            </div>

            <ul class="list-unstyled components">

                @if (auth()->user()->image)
                    <img src="{{ asset(auth()->user()->image) }}" alt="" width="100" height="100" id="sidebarimg"
                        class='rounded-circle mx-auto d-block tn'>
                @endif
                <br>

                <li class="sidebar-font">
                    <a href="{{ url('/') }}"><i class='fas fa-home'></i> &nbsp;Home</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/dashboard') }}"><i class='fas fa-columns'></i> &nbsp;Dashboard</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/profile') }}"><i class='fas fa-user'></i> &nbsp; Profile</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/task') }}"><i class='fas fa-clipboard'></i> &nbsp; Task</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/appointment') }}"><i class='fas fa-calendar-check'></i> &nbsp; Appointment</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/medication') }}"><i class='fas fa-book-medical'></i> &nbsp; Medication</a>
                </li>
                <li class="sidebar-font">
                    <a href="{{ url('/under-construction') }}"><i class='fas fa-dungeon'></i> &nbsp; Play Game <small><i>(Under construction)</i> </small></a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">

                @auth
                    @if (Auth::guard('web'))
                        <li>

                            <a class="article">{{ Auth::user()->name }}</a>

                        </li>

                        <li>
                            <a class="download" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i
                                    class='fas fa-sign-out-alt'></i> &nbsp;
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                    @endif
                @endauth
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="container mt-2">
                        @if(session()->exists('message'))
                            <div class="alert alert-success" role="alert">
                                <span class="closealert" onclick="this.parentElement.style.display='none';">&times;</span>
                                <i class="fas fa-check-circle"></i>&nbsp;{{session('message')}}
                            </div>
                        @endif
                    </div>
                </div>
            </nav>


            <main class="py-4">
                @yield('content')
            </main>

        </div>
    </div>

</body>

</html>
