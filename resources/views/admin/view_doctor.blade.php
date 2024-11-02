<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .table_container {
            text-align: center;
            margin: auto;
            margin-top: 0px;
        }

        .table_container td {
            border-bottom: 3px solid red;
            padding: 10px;
            text-align: center;
        }

        .table_container th {
            border-bottom: 3px solid red;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .intro {

            display: inline-block;
            text-align: center;
            border: 3px solid red;
            margin-bottom: 30px;
            font-size: 25px;
            font-weight: bold;
            background: rgb(44, 57, 65);
            color: white;
            width: 100%;
            margin-left: 0px;
            border-top: none;
            border-left: none;
            padding: 5px;

        }


        .doctor_img{
            width: 250px !important; 
            height: 100px !important; 
            object-fit: cover !important;
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

                <div class="table_container">

                    <div class="intro">

                        <h1>View Doctor Details</h1>

                    </div>

                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Speciality</th>
                            <th>Description</th>
                            <th>Room</th>
                            <th>Image</th>
                            <th>Update</th>
                            <th>Remove</th>
                        </tr>


                        @foreach ($doctor as $doctor)
                            <tr>

                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ Str::limit($doctor->description, 50) }}</td>
                                <td>{{ $doctor->room }}</td>
                                <td>
                                    <img class="doctor_img"
                                        src="doctorImage/{{ $doctor->image }}" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ url('edit_doctor', $doctor->id) }}">Update</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Doctor?')" href="{{ url('delete_doctor', $doctor->id) }}">Delete</a>
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
