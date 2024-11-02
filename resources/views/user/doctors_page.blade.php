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

   
    @include('user.doctor')


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
