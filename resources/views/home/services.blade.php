<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have
            suffered alteration</p>
        <div class="services_section_2">
            <div class="row">

               
                @foreach ($data as $post)
                    <div class="col-md-4">
                        <div><img src="/postimage/{{ $post->image }}" class="services_img mt-4" id="img-blog"></div>
                        <div class=" mt-5 text-align-justify">
                            <h3 class="text-primary">{{ $post->title }}</h3>
                        </div>
                        <p>Post By <b>{{ $post->name }}</b></p>
                        <div class="btn_main"><a href="{{ url('post_details',$post->id) }}">Read More</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
