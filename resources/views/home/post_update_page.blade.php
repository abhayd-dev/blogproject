<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href='/public'>
    @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->

      <div class="header_section">
      @include('home.header')
{{--     
      </div> --}}

      <div class="row mt-4">
        <div class="col-sm-6 mx-auto ">
            <div class="text-center">
                @if (session()->has('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
    {{ session()->get('message') }}
  </div>
  
@endif

            <h3 class="text-white font-weight-bold text-uppercase mt-3"> Update Post Here </h3>
            <hr class="text-white"/>
        </div>
        <div class="text-white forms">
        <form action="{{ url('update_post_page',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Post Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post" value="{{ $data->title }}">
        
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter Description"> {{ $data->description }} </textarea>
          </div>
          <div class="form-group mt-5">
            <label for="image">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" >
           
          </div>
        <div class="text-center">
        <button type="submit" class="btn btn-outline-secondary btni text-white">UPDATE POST</button>
    </div>
    <hr class="text-white"/>
      </form>
        </div>
            
    </div>
</div>
     
    
      <!-- footer section start -->
      @include('home.footer')