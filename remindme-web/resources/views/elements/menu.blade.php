    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand bold" href="/"><i class="far fa-clock"></i> RemindMe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas bg-gray-400 text-gray-400 offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header .bg-gray-100 .text-gray-600">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i class="far fa-clock"></i> RemindMe</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-gray-100 text-gray-400">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-gray-400" aria-current="page" href="/"><i
                                    class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-400" href="/user"><i class="fas fa-users"></i> Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-400" href="/channel"><i class="fas fa-comments"></i>
                                Channels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-gray-400" href="/calendars"><i class="far fa-calendar-alt"></i>
                                Calendars</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
