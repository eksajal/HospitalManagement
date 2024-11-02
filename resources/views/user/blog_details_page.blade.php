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
            height: 170px;
            /* Fixed height for all images */
            object-fit: cover;
            /* Ensures the full image is visible without cropping */
            border: 1px solid #ddd;
            /* Optional: add a border around images */
            background-color: #f9f9f9;
            /* Optional: background color for empty space */
        }
    </style>

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('user.header')


    <div class="page-section bg-light">
        <div class="container">
         
            <div class="row mt-5">


                <div class="col-lg-12 py-2 wow zoomIn">
                    <div class="" style="margin: auto !important; text-align:center !important;">
                        <div class="header">
                            <div class="post-category">
                                <a style="font-size: 40px;" href="#">{{ $blog->title }}</a>
                            </div>
                            <a class="post-thumb">
                                <img style="width: 770px !important; height: 450px !important;" src="/blogImage/{{ $blog->blog_img }}" alt="">
                            </a>
                        </div>
                        <div class="body">
                            <h5 style="border: 7px solid #07be94; border-top: none; border-bottom: none; background: skyblue; display: inline-block; width: 770px !important; padding: 20px;" class="post-title"><a>{{ $blog->description }}</a></h5>
                            <div class="site-info">
                                <div class="avatar mr-2">
                                    <div class="avatar-img">
                                        <img src="/blogerImage/{{ $blog->bloger_img }}" alt="">
                                    </div>
                                    <span>{{ $blog->bloger_name }}</span>
                                </div>
                                <span class="mai-time"></span> {{ $blog->blog_tym }}
                            </div>
                        </div>
                    </div>
                </div>

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
