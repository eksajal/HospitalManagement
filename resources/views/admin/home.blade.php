<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->

    <div class="main-panel">

        <div class="content-wrapper">
            <div class="container-fluid page-body-wrapper">


            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>

        @include('admin.script')





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

</html>/admin/
