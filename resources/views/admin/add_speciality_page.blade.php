<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')


    <style>
        .form-container {
            text-align: center;
            margin: auto;
            border: 3px solid red;
            padding: 20px;
            display: inline-block;
            padding-left: 0;
            border-top: none;
            border-bottom: none;
            border: 3px solid red;
            position: relative;
            margin-top: 80px;
            margin-left: 0px;
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
            color: black;
            height: 30px;
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
            color: red;
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

        .intro_table {

            display: inline-block;
            text-align: center;
            border: 3px solid red;
            margin-bottom: 0px;
            font-size: 25px;
            font-weight: bold;
            background: rgb(44, 57, 65);
            color: white;
            width: 210px;
            margin-left: 0px;
            border-top: none;
            border-left: none;
            padding-bottom: 0px;
            margin-top: 0px;

        }



        .table_container {
            text-align: center;
            margin: auto;
            margin-top: 0px;
            position: relative;
            border: 3px solid blue;
            margin-left: 50px;
            padding: 20px;
            border-top: none;
            border-bottom: none;
        }

        .table_container td {
            border-bottom: 3px solid red;
            padding: 20px;
            text-align: center;
         
        }

        .table_container th {
            border-bottom: 3px solid red;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
         
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

                        <h1>Add Doctor's Speciality</h1>

                    </div>

                    <form action="{{ url('upload_speciality') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-deg">

                            <label for="">Speciality</label>
                            <input type="text" name="name" placeholder="Enter a speciality" required>

                        </div>

                        <div class="form-deg">

                            <input type="submit" class="btn" value="Submit">

                        </div>

                    </form>

                </div>


                <div class="table_container">

                    <div class="intro_table">

                        <h1>Specialities</h1>

                    </div>

                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Remove</th>
                        </tr>


                        @foreach ($speciality as $speciality)
                            <tr>

                                <td>{{ $speciality->name }}</td>

                                <td>
                                    <a class="btn btn-danger" href="{{ url('delete_speciality', $speciality->id) }}">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                    </table>

                </div>


            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>

    @include('admin.script')
</body>

</html>/admin/
