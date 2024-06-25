<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
  </head>
  <body>
@include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      
            <div class="row mt-4">
                <div class="col-sm-6 mx-auto ">
                    <div class="text-center">
                        @if (session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
            {{ session()->get('message') }}
          </div>
          
      @endif
                    <h3 class="text-white font-weight-bold"> ADD POST HERE </h3>
                    <hr class="text-white"/>
                </div>
            <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post">
                
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group mt-5">
                    <label for="image">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" >
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                <div class="text-center">
                <button type="submit" class="btn btn-danger text-white">Submit</button>
            </div>
              </form>
              
                    
            </div>
        </div>
          
     </div>
     @include('admin.footer')
    </body>
    </html>