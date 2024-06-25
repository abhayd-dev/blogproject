<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    

    @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
      @include('home.header')
         <!-- banner section start -->
     
       {{-- @include('home.banner') --}}
         <!-- banner section end -->

   <div class="text-white">
   @php
     $test = \App\Http\Controllers\HomeController::test();
   @endphp 
<center><div class="col-sm-4">
<h1><b>Test 1 : {{ $test }}</b></h1>
</div></center>

@inject('testing','\App\Http\Controllers\HomeController')
<center><div class="col-sm-4">
   <h1><b>Test 2 : {{ $testing->testing() }}</b></h1>
   </div></center>
</div>

     @include('home.about')
      <!-- about section end -->
    
      <!-- footer section start -->
      @include('home.footer')