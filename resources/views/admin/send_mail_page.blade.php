<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .table_container {
            margin-left: 0px !important;
            margin-top: 0px;
            width: 100% !important;
            display: inline-block;
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
            width: 100% !important;
            margin-left: 0px;
            border-top: none;
            border-left: none;
            padding: 5px;

        }

        .mail_btn{
            border: 3px solid red;
            font-size: 20px;
            font-weight: bold;
            background: rgb(44, 57, 65);
            border-left: none;
            border-top: none;
            padding: 0px 10px;
        }

        .mail_btn:hover{
            color: red;
        }


        textarea{
            width: 450px;
            height: 200px;
            background: skyblue !important;
            color: black !important;
            font-size: 18px !important;
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

                        <h1>Send Email to <span style="color: skyblue;">'{{ $data->name }}'</span> </h1>

                    </div>


                    <div style="background: rgb(56, 71, 77); text-align: left; padding: 50px; ">

                        <div class="email-form">
                            <form action="{{ url('send_email') }}" method="POST">
                                @csrf
                                <textarea name="message" placeholder="Write your message here" rows="4" required></textarea>
                                <input type="hidden" name="recipient_email" value="{{ $data->email }}">
                                <button class="mail_btn" type="submit">Send</button>
                            </form>
                            <a href="{{ url('show_appointment') }}" style="text-decoration: underline; float: right;">Back to Appointment Page</a>
                        </div>

                    </div>


                </div>

            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
    </div>

    @include('admin.script')
</body>

</html>/admin/
