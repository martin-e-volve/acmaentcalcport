<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1836b2c391.js" crossorigin="anonymous"></script>
    <title>Client portal</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel='stylesheet'>
     <link href="{{asset('styles.css')}}" rel='stylesheet'>
     @livewireStyles
</head>
<body>
    
<div>
{{--sidebar--}}
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><img src='{{asset("images/AC-LOGO-2022-HORIZONTALWHITE.png")}}' alt="Logo" width="175" height="auto" class="d-inline-block align-text-top"></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Technical Docs</span></a>
                        </li>
                        <li>
                            <a href="" class="nav-link px-0 align-middle ">Marketing</a>
                                
                        </li>
                        
                                <li>
                        
                                    <a href="{{route('settings')}}" class="nav-link px-0">Settings</a>
                                </li>
                            </ul>
                        </li>
                      
                    </ul>
                    <hr>
                  
                </div>
            </div>
        
    
        <div class='p-0 col-auto col-md-9 col-xl-10'>
            <div class="py-3 px-3 bg-light d-flex justify-content-between">
                <h3>@yield('title')</h3>
                <form method='post' action='/logout'>
                    @csrf
                    <button class='btn btn-primary' type='submit'>Log out</button>
                </form>
            </div>
            <div class='p-3'>
            @yield('main_content')
            </div>
        </div>
</div>
    </div>
</div>

@if(session()->has('success'))
    <div class='bg-success p-2 rounded position-fixed fixed-top'>
        <p class=text-white>{{session('success')}}</p>
    </div>
@endif
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>   
</body>
<footer>
    {{--add footer--}}
</footer>
</html>