<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
    @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
      @include('home.header')
      </div>

    
      <div class="row">
        <center>
     <div class="col-md-6">
        <h1 class="mt-3">Blog In Detail</h1>
        <div><img src="/postimage/{{ $post->image }}" class="services_img p-3"></div>
        <div class=" mt-5 text-align-justify">
            <h3 class="text-primary"><b>{{ $post->title }}</b></h3>
            <h3 class=""><b>{{ $post->description }} Lorem ipsum dolor sit, amet consectetur adipisicing elit. A velit eligendi quisquam molestiae dicta laudantium recusandae porro laboriosam quia illo magni, nemo, aliquam optio ea modi non nostrum pariatur similique.</b></h3>
        </div>
        <p>Post By <b>{{ $post->name }}</b></p>
       
    </div>
</center>
</div>
    
    
      <!-- footer section start -->
      @include('home.footer')