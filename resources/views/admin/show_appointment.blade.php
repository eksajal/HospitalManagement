<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .table_container {
            width: 100% !important;
            margin: auto;
            margin-top: 0px !important;
        }

        .table_container td {
            border-bottom: 3px solid red;
            padding: 5px;
            text-align: center;
        }

        .table_container th {
            border-bottom: 3px solid red;
            padding: 5px;
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
            width: 105% !important;
            margin-left: 0px;
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

                <div class="table_container">

                    <div class="intro">

                        <h1>Appointment Requests</h1>

                    </div>

                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Update Status</th>
                            <th>Remove</th>
                            <th>Send Mail</th>
                        </tr>


                        @foreach ($data as $data)
                            <tr>

                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->doctor }}</td>
                                <td>{{ $data->date }}</td>
                                <td>
                                    {{ Str::limit( $data->message, 10) }} <br>
                                    <a style="text-decoration: underline;" class="" href="{{ url('message', $data->id) }}">Details</a>
                                </td>

                                <td>

                                    @if ($data->status == 'Approved')
                                        <span style="color: green;">{{ $data->status }}</span>
                                    @endif

                                    @if ($data->status == 'Cancelled')
                                        <span style="color: red;">{{ $data->status }}</span>
                                    @endif

                                    @if ($data->status == 'In progress')
                                        <span style="color: blue;">{{ $data->status }}</span>
                                    @endif

                                </td>

                                <td>
                                    <a style="margin-bottom: 8px;" class="btn btn-success"
                                        href="{{ url('approve_appoint', $data->id) }}">Approved</a>
                                    <a class="btn btn-danger"
                                        href="{{ url('cancel_appoint', $data->id) }}">Cancelled</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this Appointment?')" href="{{ url('delete_appoint', $data->id) }}">Delete</a>
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="{{ url('send_mail_page', $data->id) }}">Send Mail</a>
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
