<div class="page-section">
    <div class="container">
        <h1 style="font-size: 2.5rem;" class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
            <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">

                @foreach ($doctor as $doctors)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img class="doctor_image" src="doctorImage/{{ $doctors->image }}" alt="">
                            <div class="meta">
                                <!-- Calling Number -->
                                <a href="tel:{{ $doctors->phone }}"><span class="mai-call"></span></a>
                                <!-- WhatsApp Number -->
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $doctors->phone) }}"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{ $doctors->name }}</p>
                            <span class="text-sm text-grey"><strong>{{ $doctors->speciality }}</strong></span><br>
                            <span class="text-sm text-grey">{{ $doctors->description }}</span>
                        </div>
                    </div>                   
                </div>
                @endforeach

    </div>
</div>
</div>
