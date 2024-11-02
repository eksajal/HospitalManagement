<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

    <style>
        .table_container {
            margin-bottom: 150px !important;
            margin-top: 60px !important;
            width: 80%;
            margin: auto;
        }

        .table_container td {
            border-bottom: 3px solid #07be94;
            padding: 35px;
            text-align: center;
        }

        .table_container th {
            border-bottom: 3px solid #07be94;
            padding: 35px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #07be94;
        }

        .intro {

            display: inline-block;
            text-align: center;
            margin-bottom: 10px;
            color: black;
            width: 100%;
            margin-left: 0px;
            border-top: none;
            border-left: none;
            padding: 5px;

        }


        .btn {

            background: #07be94;
            color: white;
            border: 2px solid black;
            border-top: none;
            border-left: none;
        }
    </style>


</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('user.header')



    @if (session('message'))
        <div id="notification"
            style="background-color: green; color: white; text-align: center; margin-top: 5px; position: fixed; top: 20px; right: 20px; padding: 10px 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);">
            {{ session('message') }}
            <button onclick="hideNotification()"
                style="background: transparent; border: none; color: white; font-size: 16px; font-weight: bold; float: right; cursor: pointer;">&times;</button>
        </div>
        <script>
            function hideNotification() {
                document.getElementById('notification').style.display = 'none';
            }

            // Automatically hide the notification after 3 seconds
            setTimeout(hideNotification, 10000);
        </script>
    @endif



    <div class="table_container">

        <div class="intro">

            <h1 style="font-size: 2.5rem;" >Your Appointments History</h1>

        </div>

        <table>
            <tr>
                <th>Doctor</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Cancel</th>
            </tr>


            @foreach ($appoint as $appoints)
                <tr>

                    <td>{{ $appoints->doctor }}</td>
                    <td>{{ $appoints->date }}</td>
                    <td>{{ $appoints->message }}</td>
                    <td>
                        @if ($appoints->status == 'Approved')
                            <span style="color: blue;">{{ $appoints->status }}</span>
                        @endif

                        @if ($appoints->status == 'Cancelled')
                            <span style="color: red;">{{ $appoints->status }}</span>
                        @endif

                        @if ($appoints->status == 'In progress')
                            <span style="color: black;">{{ $appoints->status }}</span>
                        @endif
                    </td>


                    <td>

                        @if ($appoints->status == 'In progress')
                            <a class="btn" onclick="return confirm('Are you sure to cancel this appointment?')"
                                href="{{ url('cancel_appoint', $appoints->id) }}">Cancel</a>

                                @else
                                <a class="btn">Denied</a>
                        @endif

                        
                    </td>

                </tr>
            @endforeach

        </table>

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
