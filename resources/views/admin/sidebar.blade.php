<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href="{{ url('redirect') }}" style="color: white; ">
                <h1>ADMIN<span style="color: red;">PANEL</span><span style="color: white; border-right: 3px solid red; background: black;"><i class="mdi mdi-account"></i></span> </h1>            
            </a>
            <a class="sidebar-brand brand-logo-mini" href="{{ url('redirect') }}"></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="/admin/assets/images/faces/face15.jpg"
                                alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">Mr.Sajal</h5>
                            <span>Admin</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                            class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                        aria-labelledby="profile-dropdown">
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('redirect') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-home"></i>
                    </span>
                    <span class="menu-title">Home</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('add_doctor_view') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-doctor"></i>
                        <i class="mdi mdi-plus"></i>
                    </span>
                    <span class="menu-title">Add Doctors</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('add_speciality_view') }}">
                    <span class="menu-icon">
                      <i class="mdi mdi-stethoscope"></i>
                    </span>
                    <span class="menu-title">Speciality</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('view_doctor') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-doctor"></i>
                    </span>
                    <span class="menu-title">View Doctors</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('show_appointment') }}">
                    <span class="menu-icon">
                      <i class="mdi mdi-calendar"></i>
                    </span>
                    <span class="menu-title">Appointments</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('add_blog') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-pencil-outline"></i>
                    </span>
                    <span class="menu-title">Add Blog</span>
                </a>
            </li>

            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('view_blog') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-note-text"></i>

                    </span>
                    <span class="menu-title">View Blogs</span>
                </a>
            </li>

        </ul>
    </nav>
