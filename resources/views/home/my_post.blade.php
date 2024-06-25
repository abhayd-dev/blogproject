<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    

    @include('home.homecss')
    <style>
.post_deg{
    padding: 30px;
    /* background-image: linear-gradient(to right, rgb(228, 24, 198),rgb(84, 220, 47)) */

    background: white;
}
.card{
    width:420px !important;
    padding: 20px;
    
}

.title_deg{
    font-size: 30px;
    font-weight: bold;
    padding: 8px;

}
.description{
    font-size: 12px;
    font-weight: bold;
 text-align: justify;

}
    </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section mb-5">
      @include('home.header')
    
      @if (session()->has('message'))
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
          {{ session()->get('message') }}
      </div>
  @endif

  <center> <h1><b class="text-uppercase text-white">My Blogs</b></h1></center>
     @foreach ($datas as $data)
         
   
      <div class="post_deg">
       
        <center> 
            <hr class="text-dark" />
      <div class="card">
            <div class="card-img">
        <img src="/postimage/{{$data->image}}" height="500px" width="400" class="rounded"/>
    </div>
    <div class="card-title text-center">
        <h4 class="title_deg">{{ $data->title }}</h4>
    </div>
    <div class="description">
        <p > {{ $data->description }}</p>
    </div>
    <div class="card-footer text-left ">
        <img src="images/heart.png" height="30" width="30" alt="" class="">
        <img src="images/chat.png" height="30" width="30" alt="" class="ml-4">
        <img src="images/send.png" height="30" width="25" alt="" class="ml-4">
        <div class=" mt-2">Posted Date : {{ $today}}</div>
    </div>

    </div>
    <div class="col-sm-6">
        <a href={{url('create_post')}} class="btn btn-primary mr-4 mt-3">ADD BLOG</a>
        <a href="{{ url('my_post_del',$data->id) }}" class="btn btn-danger ml-3 mt-3">DELETE NOW</a>
        <a href="{{ url('post_update_page',$data->id) }}" class="btn btn-success ml-3 mt-3">UPDATE NOW</a>
    </div>
    <hr class="text-dark" />
</center>  
      </div>
      @endforeach

      <!-- footer section start -->
      @include('home.footer')
     