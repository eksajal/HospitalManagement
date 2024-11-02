<div class="page-section">
    <div class="container">
        <h1 style="font-size: 2.5rem;" class="text-center wow fadeInUp">Make an Appointment</h1>


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



        <form class="main-form" action="{{ url('appointment') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="name" class="form-control" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="email" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select">

                        <option value="">--Select doctor--</i></option>

                        @foreach ($doctor as $doctors)
                            <option value="{{ $doctors->name }}">{{ $doctors->name }} | {{ $doctors->speciality }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="number" class="form-control" placeholder="Number..">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->
