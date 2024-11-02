<div class="page-section bg-light">
    <div class="container">
        <h1 style="font-size: 2.5rem;" class="text-center wow fadeInUp">Latest News</h1>
        <div class="row mt-5">


            @foreach ($blog as $blog)
                <div class="col-lg-4 py-2 wow zoomIn">
                    <div class="card-blog">
                        <div class="header">
                            <div class="post-category">
                                <a href="#">{{ $blog->title }}</a>
                            </div>
                            <a href="{{ url('blog_details_page', $blog->id) }}" class="post-thumb">
                                <img src="blogImage/{{ $blog->blog_img }}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 class="post-title"><a
                                    href="{{ url('blog_details_page', $blog->id) }}">{{ Str::limit($blog->description, 50) }}</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="blogerImage/{{ $blog->bloger_img }}" alt="">
                                    </div>
                                    <span>{{ $blog->bloger_name }}</span>
                                </div>
                                <span class="mai-time"></span> {{ $blog->blog_tym }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{ url('blog_page') }}" class="btn btn-primary">Read More</a>
            </div>

        </div>
    </div>
</div> <!-- .page-section -->
