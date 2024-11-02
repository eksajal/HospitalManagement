<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')


    <style>
        .form-container {
            text-align: center;
            margin: auto;
            margin-top: 0px;
            border: 3px solid red;
            padding: 20px;
            display: inline-block;
            padding-left: 0;
            border-top: none;
            border-bottom: none;
        }

        .form-deg {
            padding: 20px;
            padding-left: 0px;
        }

        .form-deg label {
            width: 200px;
            font-size: 15px;
        }

        .form-deg input {
            width: 250px;
            height: 30px;
        }

        .form-deg input,
        select,
        option {
            width: 250px;
            color: white !important;
            height: 30px;
            background: rgb(44, 57, 65) !important;
        }

        textarea{
            width: 250px;
            color: white !important;
            height: 80px;
            background: rgb(44, 57, 65) !important;
        }


        .form-deg .btn {

            border: 3px solid red;
            color: white;
            width: 410px;
            display: inline-block;
            margin-left: 50px;
            font-size: 25px;
            font-weight: bold;
            padding: 5px;
            height: 40px;
            background: rgb(44, 57, 65);
            border-top: none;
            border-bottom: none;
            margin-top: 30px;

        }

        .form-deg .btn:hover {
            color: red !important;
        }

        .intro {

            display: inline-block;
            text-align: center;
            border: 3px solid red;
            margin-bottom: 50px;
            font-size: 25px;
            font-weight: bold;
            background: rgb(44, 57, 65);
            color: white;
            width: 410px;
            margin-left: 32px;
            border-top: none;
            border-left: none;
            padding: 5px;

        }
    </style>



</head>

<body>
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->



    @if (session('message'))
        <div id="toast"
            style="position: fixed; top: 20px; right: 20px; background-color: green; color: white; padding: 10px 20px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); z-index: 9999;">
            <span>{{ session('message') }}</span>
            <button onclick="hideToast()"
                style="background: transparent; border: none; color: white; font-size: 16px; font-weight: bold; cursor: pointer;">&times;</button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(hideToast, 10000); // Auto-hide after 10 seconds
            });

            function hideToast() {
                var toast = document.getElementById('toast');
                if (toast) {
                    toast.style.display = 'none';
                }
            }
        </script>

        @php
            session()->forget('message');
        @endphp
    @endif




    <div class="main-panel">

        <div class="content-wrapper">
            <div class="container-fluid page-body-wrapper">




                <div class="form-container">

                    <div class="intro">

                        <h1>Enter Doctor Details</h1>

                    </div>

                    <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-deg">

                            <label for="">Doctor Name</label>
                            <input type="text" name="name" placeholder="Write doctor's name" required>

                        </div>

                        <div class="form-deg">

                            <label for="">Doctor Number</label>
                            <input type="number" name="phone" placeholder="Write doctor's number" required>

                        </div>

                        <div class="form-deg">

                            <label for="">Speciality</label>
                            <select name="speciality" id="" style="color: black; padding: 0;" required>
                                <option value="">---Select---</option>

                                @foreach ($speciality as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>  
                                @endforeach
                                
                            </select>

                        </div>



                        <div class="form-deg">

                            <label for="">Description</label>
                            <textarea name="description" id="" placeholder="Write doctor's description" ></textarea>

                        </div>



                        <div class="form-deg">

                            <label for="">Room Number</label>
                            <input type="text" name="room" placeholder="Write doctor's room number" required>

                        </div>

                        <div class="form-deg">

                            <label for="">Doctor Image</label>
                            <input style="color: white;" type="file" name="image" required>

                        </div>

                        <div class="form-deg">

                            <input type="submit" class="btn" value="Submit">

                        </div>

                    </form>

                </div>


            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>

    @include('admin.script')
</body>

</html>/admin/
