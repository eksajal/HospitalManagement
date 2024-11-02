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

    <div class="page-section">

        <h1 style="font-size: 2.5rem;" class="text-center mb-5 wow fadeInUp">About Us</h1>




        <div class="bg-light">
            <div class="page-section py-3 mt-md-n5 custom-index">
                <div class="container">
                    <div class="row justify-content-center">

                    </div>
                </div>
            </div> <!-- .page-section -->

            <div class="page-section pb-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 py-3 wow fadeInUp">
                            <h1>Welcome to Your Health <br> Center</h1>
                            <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                voluptua. At
                                vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa
                                eius,
                                inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi
                                accusantium! Placeat voluptates esse ut optio facilis!</p>
                            <a href="about.html" class="btn btn-primary">Learn More</a>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                            <div class="img-place custom-img-1">
                                <img src="../assets/img/bg-doctor.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .bg-light -->
        </div> <!-- .bg-light -->

</div>


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
