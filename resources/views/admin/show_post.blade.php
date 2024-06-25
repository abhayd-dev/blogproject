<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            <div class="row mt-5">
                <div class="col-sm-11 mx-auto ">
                    @if (session()->has('message'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <h3 class="text-white mt-2 mb-3 font-weight-bold"> ALL POSTS </h3>
                        <hr class="text-white" />
                    </div>
                    <div class="table-responsive">
                    <table id="tbl" class="table table-dark table-hover ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Post Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Post By</th>
                                <th scope="col">Post Status</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Image</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->post_status }}</td>
                                    <td>{{ $post->usertype }}</td>
                                    <td><img class="rounded-circle" src="postimage/{{ $post->image }}" alt="image"
                                            width="
                                    70px" height="70px" /></td>
                                    <td><a href="{{ url('delete_post', $post->id) }}" class="btn btn-sm btn-danger m-3"
                                            onclick="confirmation(event)">Delete</a>

                                    </td>
                                    <td><a href="{{ url('edit_post', $post->id) }}" class="btn btn-sm btn-success mt-3 mr-3 mb-3">Update</a>

                                    </td>
                                  

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>

            </div>
        </div>
        @include('admin.footer')

        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href'); 
                swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this post",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }

         
                    
        </script>
</body>

</html>
