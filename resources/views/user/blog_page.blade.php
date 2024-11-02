<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

    <style>
        .doctor_image {
            height: 300px !important;
        }






/* Container for search results */
.search-results-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

/* Each search result item */
.search-result-item {
    width: 30%;
    margin: 10px;
    text-align: center;
}

/* Image styling */
.doctor-image img {
    width: 40%;
    height: 170px; /* Fixed height for all images */
    object-fit: cover; /* Ensures the full image is visible without cropping */
    border: 1px solid #ddd; /* Optional: add a border around images */
    background-color: #f9f9f9; /* Optional: background color for empty space */
}






    </style>

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('user.header')


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
    
            </div>
        </div>
    </div> <!-- .page-section -->
    
  

    @include('user.footer')





    <!------Script to stuck the display in activity area------>

    <script>
        window.onload = function() {
            // Restore scroll position after full load
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                const {
                    top,
                    left
                } = JSON.parse(scrollPosition);
                window.scrollTo(left, top);
            }
        };

        // Save scroll position before the page unloads
        window.addEventListener('beforeunload', function() {
            const scrollPosition = {
                top: window.scrollY,
                left: window.scrollX
            };
            localStorage.setItem('scrollPosition', JSON.stringify(scrollPosition));
        });
    </script>





</body>

</html>
