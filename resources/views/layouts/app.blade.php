<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        {{-- cubic --}}
        <link type="text/css" href="{{ asset('css') }}/cubic.css?v=1.0.0" rel="stylesheet">
 {{-- Bootstrap5 --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        {{-- fontasome5 --}}
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> --}}
        <style>
            .addBtn::before{
                content:"\f067";
                float: left;
                margin-top: 1px;
                margin-right: -22px;
                font-family: 'FontAwesome';
                } 
                .alert-custom-danger{
                    height: 80px;
                    border-radius: 5px;
                    margin: 4px 1px;
                    padding: 27px 12px 7px 12px;
                    background-color: #ffdddd;
                    border-left: 8px solid #f44336;}
                 .alert-custom-success{
                    color: #fff;
                    height: 80px;
                    border-radius: 5px;
                    margin: 4px 1px;
                    padding: 27px 12px 7px 12px;
                    background-color: #22a45da6;
                    border-left: 8px solid #248656;}


                    .card>img{
                        width: 100%;
                        height: 200px;
                    }
                    svg {
                        width: 25px;}
                        .text-sm {
                        font-size: .875rem !important;
                        margin: 10px 0;}


                        .invalid-feedback>strong{
                            display: block;
                        font-weight: bolder;
                        margin-top: -48px;
                        }
                    
                    @media (min-width: 800px){
                    .modal-dialog {
                        max-width: 800px;
                        margin: 1.75rem auto;
                    }}
                    .modal-open .modal {
                        background-color: #00000078;
                    }


                    .alert-custom-danger {
                        text-align: justify;
                        }
                        #staticBackdrop strong {float: left;} 


                      /* button */
        
        .buttonEffect {
            margin:auto;
            position: relative;
            width:50%;
            border: none;
            font-size: 20px;
            color: #FFFFFF;
            text-align: center;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            cursor: pointer;
        }
        
        .buttonEffect:hover {
            background-color: #999;
        }
        
        .buttonEffect:after {
            content: "";
            background: #fdfffd;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 3s
        }
        
        .buttonEffect:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
        /* button next&&previous */
        .menu__item {
            top: 1px;
            right: 1px;
            width: 4.14rem;
            height: 4.14rem;
            position: absolute;
            border-radius: 4px;
             background: #7f8081;
            display: inline-block;
            /* margin-left: 1.1rem; */
            animation-duration: 0s;
            will-change: width background-color;
            transition: background 0.55s;
            vertical-align: top;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 1px rgba(0, 0, 0, 0.1);
        }
         .menu__item:hover {
            background-color: #fb6340;
        }
        .menu__item>i{
            color: #fff;
            
        }
        
        .menu__item--animate {
            animation-duration: 0.5s;
        }
        
        .menu__item--active {
         
        }
      .menu__item--active.menu__item--orange {
             background-color: #fb6340;
        }
         .menu__item--active.menu__item--orange>i {
        color: #fff;
        }
        
       
       
        </style>
    </head>
    <body class="{{ $class ?? '' }}">
    
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest
                            {{-- popS --}}
                                <div class="modal fade" id="cubicPopUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" style="margin: 300px 50%;">
                                             <div class="cubic row">
                                                <!--Cubic Begin------------------------------>
                                                    <div class="rubiks-loader">
                                                    <div class="cube">
                                                        <!-- base position -->
                                                        <div class="face front piece row-top    col-left   yellow"></div>
                                                        <div class="face front piece row-top    col-center green "></div>
                                                        <div class="face front piece row-top    col-right  white "></div>
                                                        <div class="face front piece row-center col-left   blue  "></div>
                                                        <div class="face front piece row-center col-center green "></div>
                                                        <div class="face front piece row-center col-right  blue  "></div>
                                                        <div class="face front piece row-bottom col-left   green "></div>
                                                        <div class="face front piece row-bottom col-center yellow"></div>
                                                        <div class="face front piece row-bottom col-right  red   "></div>

                                                        {{-- <!-- first step: E', equator inverted --> --}}
                                                        <div class="face down  piece row-top    col-center green "></div>
                                                        <div class="face down  piece row-center col-center red   "></div>
                                                        <div class="face down  piece row-bottom col-center white "></div>

                                                        <!-- second step: M, middle -->
                                                        <div class="face right piece row-center col-left   yellow"></div>
                                                        <div class="face right piece row-center col-center green "></div>
                                                        <div class="face right piece row-center col-right  blue  "></div>

                                                        <!-- third step: L, left -->
                                                        <div class="face up    piece row-top    col-left   yellow"></div>
                                                        <div class="face up    piece row-center col-left   blue  "></div>
                                                        <div class="face up    piece row-bottom col-left   green "></div>

                                                        <!-- fourth step: D, down -->
                                                        <div class="face left  piece row-bottom col-left   green "></div>
                                                        <div class="face left  piece row-bottom col-center yellow"></div>
                                                        <div class="face left  piece row-bottom col-right  red   "></div>
                                                    </div>
                                                </div>
                                                <!--Cubic End------------------------------>
                                            </div>
                                       
                                      
                                    </div>
                                </div>
                            {{-- popE --}}
                            {{-- popS --}}
                                <div class="modal fade" id="ErrorPopUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" style="margin: 300px 50%;">
                                             <div class="cubic row">
                                                <!--Cubic Begin------------------------------>
                                                    <div class="rubiks-loader">
                                                    <div class="Error">
                                                  <img src="{{ asset('img/1.jpg') }}" alt="{{ __('error') }}">
                                                    </div>
                                                </div>
                                                <!--Cubic End------------------------------>
                                            </div>
                                      
                                      
                                    </div>
                                </div>
                            {{-- popE --}}









        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        //Added JS
         <script src="{{ asset('assets') }}/js/popupOpenJs.js?v=1.0.0"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        
    </body>
</html>