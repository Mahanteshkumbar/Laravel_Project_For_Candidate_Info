<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="csrf_token" content="{ csrf_token() }" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        #app-layout{
              background-color:#cbd0d3;
        }
        .view_parent_image1{
            position: relative; 
            width: 100%; /* for IE 6 */
        }
        .navbar{            
           top: 0px; 
           left: 0; 
           width: 100%;
           background-color: rgba(41, 128, 185,0.7);
        }
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: #ecf0f1;  /*Sets the text hover color on navbar*/
        }

        .navbar-default .navbar-brand {
            color: #f1c40f;
        }

        .navbar-default .navbar-nav>li>a{ 
            font-family: "Arial", Helvetica, sans-serif;           
            color: #f1c40f;
        }    

    </style>
</head>
<body id="app-layout">

     <div class="outer">
        <!-- <p>(text to appear at the bottom left of the image)</p> -->
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Laravel
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <!-- <li><a href="{{ url('/home') }}">Home</a></li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" class="color-me">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            <li><a href="{{ url('/admin/login') }}">Admin Login</a></li>
                            <li><a href="{{ url('admin/register') }}">Admin Register</a></li>
                            <li><a href="{{ url('/register/candidate') }}">Candidate Register</a></li>
                            <li><a href="{{url('/candidate/searchjobview')}}">Search Job</a></li>
                        @else
                            <li><a href="{{url('/candidate/searchjobview')}}">Search Job</a></li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif

                        @if(Auth::guard('admin')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            @if (Auth::guest())
              {{ Html::image('/images/2.jpg', 'logo',array( 'width' => '100%', 'height' => 250, 'class' => '' )) }}
            @endif
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('flash::message')
               <!--  @if(Session::has('flash_message'))                
                <div class="alert alert-success">
                   @if(Session::has('flash_message_important')) 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @endif
                    {{ session('flash_message') }}
                </div>
                @endif -->
            </div>
        </div>
    </div>
       @yield('content')
    <!-- JavaScripts -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        $('div.alert').fadeOut(3000);
    </script>
</body>
</html>
