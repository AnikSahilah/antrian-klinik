<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ url('admin/dashboard') }}">
                <img class="logo-icon me-2" src="{{ asset('assets/images/app-logo.svg') }}" alt="logo">
                <span class="logo-text">Omah Kreativ</span>
            </a>
        </div>

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/dashboard') }}">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/jadwal') }}">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                <path d="M10.854 9.146a.5.5 0 0 0-.708 0L8 11.293 6.854 10.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l2.5-2.5a.5.5 0 0 0 0-.708z" />
                                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2H3V1a.5.5 0 0 1 1 0v1h8V1a.5.5 0 0 1 1 0v1h.5A1.5 1.5 0 0 1 15 3.5V4H1v-.5zM1 5v7.5A1.5 1.5 0 0 0 2.5 14h11a1.5 1.5 0 0 0 1.5-1.5V5H1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Jadwal</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/antrian') }}">
                        <span class="nav-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM14 5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1h3zm0 2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1h2zm0 2a.5.5 0 0 1 0 1h-1a.5.5 0 0 1 0-1h1z" />
                            </svg>
                        </span>
                        <span class="nav-link-text">Antrian</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>