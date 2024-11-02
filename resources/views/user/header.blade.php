<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <!-- Phone Number Link -->
                        <a href="tel:+001234556666"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                        <span class="divider">|</span>
                        <!-- Email Link -->
                        <a href="mailto:codevibebd@gmail.com">
                            <span class="mai-mail text-primary"></span> codevibebd@gmail.com
                        </a>                        
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/demo.profile" target="_blank" rel="noopener noreferrer">
                            <span class="mai-logo-facebook-f"></span>
                        </a>
                    
                        <!-- Twitter -->
                        <a href="https://twitter.com/demo.profile" target="_blank" rel="noopener noreferrer">
                            <span class="mai-logo-twitter"></span>
                        </a>
                    
                        <!-- Dribbble -->
                        <a href="https://dribbble.com/demo.profile" target="_blank" rel="noopener noreferrer">
                            <span class="mai-logo-dribbble"></span>
                        </a>
                    
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/demo.profile" target="_blank" rel="noopener noreferrer">
                            <span class="mai-logo-instagram"></span>
                        </a>
                    </div>                    
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">One</span>-Health</a>


            <!-- Search Form -->
            <form action="{{ route('search') }}" method="GET">
                <div class="input-group input-navbar">
                    <input type="text" name="keyword" class="form-control" placeholder="Enter keyword.."
                        aria-label="Search" aria-describedby="icon-addon1">
                    <div class="input-group-prepend">
                        <button style="background-color: transparent; border: none; outline: none; box-shadow: none;">
                            <span style="padding: 12px;" class="input-group-text" id="icon-addon1">
                                <span class="mai-search" style="display: inline-block; transition: transform 0.3s ease;"
                                    onmouseover="this.style.transform='scale(1.5)'"
                                    onmouseout="this.style.transform='scale(1)'">
                                </span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>



            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('doctors_page') }}">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('blog_page') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact_page') }}">Contact</a>
                    </li>

                    @if (Route::has('login'))

                        @auth()
                            <li class="nav-item" style="background: #00D9A5">
                                <a style="color: white !important;" class="nav-link" href="{{ url('myappointment') }}">My
                                    Appointment</a>
                            </li>

                            <x-app-layout>

                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ url('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ url('register') }}">Register</a>
                            </li>
                        @endauth

                    @endif

                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>



    <!-- Search Results Section -->
    @if (request('keyword') && isset($doctor) && $doctor->isNotEmpty())
        <div class="container search-results mt-4">
            <h4>Search Results from Doctors:</h4>
            <div class="search-results-grid">
                @foreach ($doctor as $doc)
                    <div class="search-result-item">
                        <!-- Doctor Image -->
                        <div class="doctor-image">
                            <img style="width: 60%;" src="{{ asset('doctorImage/' . $doc->image) }}" alt="{{ $doc->name }}">
                        </div>
                        <div class="doctor-details">
                            <strong>{{ $doc->name }}</strong><br>
                            Speciality: {{ $doc->speciality ?? 'N/A' }}<br>
                            Room: {{ $doc->room ?? 'N/A' }}<br>
                            Phone: {{ $doc->phone ?? 'N/A' }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif




     <!-- Search Results Section for Blog -->
     @if (request('keyword') && isset($blog) && $blog->isNotEmpty())
     <div class="container search-results mt-4">
         <h4>Search Results from Blogs:</h4>
         <div class="search-results-grid">
             @foreach ($blog as $doc)
                 <div class="search-result-item">
                    <h1>{{ $doc->title }}</h1>
                     <!-- Doctor Image -->
                     <div class="doctor-image">
                         <img style="width: 100%;" src="{{ asset('blogImage/' . $doc->blog_img) }}" alt="{{ $doc->title }}">
                     </div>                   
                     <div class="doctor-details" style="background: #07be94;" >
                         <strong>{{ $doc->name }}</strong><br>
                         <strong>{{ $doc->description ?? 'N/A' }}</strong><br>
                         Published by:<img style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('blogerImage/' . $doc->bloger_img) }}" alt="{{ $doc->title }}">{{ $doc->bloger_name ?? 'N/A' }} <br>
                        
                         <a style="color: black;" href="{{ url('blog_page') }}">view details...</a>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 
 @endif



<!-- No Search Results Section -->
@if (request('keyword') && isset($doctor) && $doctor->isEmpty() && isset($blog) && $blog->isEmpty())
<div class="container search-results mt-4">
    <h4>No search result for '{{ request('keyword') }}'</h4>
</div>
@endif


</header>
