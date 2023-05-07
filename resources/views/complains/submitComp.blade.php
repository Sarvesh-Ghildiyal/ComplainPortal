<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="Website icon" href="/logo2.png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

     
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
            
            {{-- Header Section of the form --}}            
                        <header class="mt-2">
                            <div class="row">
                            <div class="col-4 college_logo"><img src="/logo2.png" alt="College Logo" class="img-fluid w-50 "></div>
                            <div class="col-8 college_name">THDC_Institute of Hydropower Engineering & Technology, Tehri</div>
                        </div>
                        </header>
    
                    <div class="card-header mt-3"><h3>Complain Form</h3></div>
            
                    @if($errors)
                    @foreach($errors->all() as $error)
                      <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif
            {{-- Main form --}}
                            
                    {{-- <h3 class="col-12">Complain Form</h3> --}}
                    <!-- Proper form -->
                    <form  id="complain_form" class="col-12" method="Post" action="{{route('submit_complain')}}">
                    
                
                            @csrf
                            <div class="row complain_form">
                                <div class="col-md-6 mt-2">
                                    <label for="department">Department:</label>
                                    <input type="text" id="department" name="department" class="form-control" placeholder="eg:CSE">
                                </div>
                                
                                <div class="col-md-6 mt-2">
                                    <label for="room_no">Room Number:</label>
                                    <input type="text" id="room_no" name="room_no" class="form-control" placeholder="eg:205">
                                </div>
                    
                                <div class="col-md-6 mt-4">
                                    <label for="reported_by">Reported By:</label>
                                    <input type="text" id="reported_by" name="reported_by" class="form-control" placeholder="eg:Aleva">
                                </div>
                                
                                <div class="col-md-6 mt-4">
                                    <label for="requested_by">Requested By:</label>
                                    <input type="text" id="requested_by" name="requested_by" class="form-control" placeholder="eg:Ganel">
                                </div>
                    
                                <div class="col-md-12 mt-4">
                                    <label for="description" class="form-label">Problem:</label>
                                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 d-flex justify-content-center">Submit</button>
                    </form>
                 </div>
            </div>
                    
            </div>
        </div>
       
    </div>
</body>
</html>
