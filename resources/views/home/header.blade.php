
<div class="header_main">
    <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="index.html"><img src="images/logo.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="contact.html">Contact</a>
                </li>
             </ul>
          </div>
       </nav>
    </div>
    <div class="container-fluid">
       <div class="logo"><a href="index.html"><img src="images/blogger.png" height="60" width="60"></a></div>
       <div class="menu_main">
          <ul>
             <li class="active"><a href="{{ url('/') }}">Home</a></li>
             <li><a href="{{ url('/about_page') }}">About</a></li>
             {{-- <li><a href="services.html">Services</a></li> --}}
             {{-- <li><a href="blog.html">Blog</a></li> --}}
             @if (Route::has('login'))
             @auth
             
             <li class="nav-item dropdown" id="myuserbtn">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   {{ Auth::user()->name }}
               </a>

               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item bg-primary" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       {{ __('Logout') }}
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                   </form>
               </div>
           </li>
           <li><a href="{{ url('create_post') }}">Create Blog</a></li>
           <li><a href="{{ url('my_post') }}">My Blog</a></li>
                @else
             <li><a href="{{ route('login') }}">Login</a></li>
             <li><a href="{{ route('register') }}">Register</a></li>
             @endauth
             @endif
          </ul>
       </div>
    </div>
 </div>