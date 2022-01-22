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
{{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  --}}
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        {{--  <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        {{--  swiperHome_style--}}
        <link type="text/css" href="{{ asset('css') }}/swiperHome.css?v=1.0.0" rel="stylesheet">  
        {{--  cubic  --}}
        <link type="text/css" href="{{ asset('css') }}/cubic.css?v=1.0.0" rel="stylesheet">
          
         {{-- user_style --}}
        <link type="text/css" href="{{ asset('css') }}/user_style.css?v=1.0.0" rel="stylesheet">
 {{-- Bootstrap5 Getttting  written afternext both statment--}}
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
         {{--start  <!--Gettind Swipper 4-->  --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
 {{--end  <!--Gettind Swipper 4-->  --}}
        {{-- fontasome5 --}}
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        
<style></style>
    </head>
    <body class="{{ $class ?? '' }}" style="background-color:currentColor">
{{--  currentColor  --}}
 @include('includes.nav_home')
        @include('layouts.popUp_Cubic')
        @yield('content')
@include('includes.footer') 














        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          {{--  //Added JS  --}}
         <script src="{{ asset('assets') }}/js/popupOpenJs.js?v=1.0.0"></script>  
        @stack('js')
        {{--  <!-- Argon JS -->  --}}
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        
    {{--  <!-- Swiper JS All swipper written afternext both statment -->  --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>


    {{--  swiperHome_js--}}
         <script src="{{ asset('assets') }}/js/swiperHome.js?v=1.0.0"></script>
         <script>
          $('.AncorGetVideo').click(function(){
           var hrefAncor=$(this).prop('href');
          $('#ModalshowVideo .modal-dialog .modal-content .modal-body iframe').prop('src',hrefAncor);
      });
         </script>
    </body>
</html>