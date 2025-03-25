<header class="header position-relative z-9">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary fixed-top headroom">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-3" href="#">
                <img class="navbar-brand-dark" src="{{ asset('frontend/assets/img/logo.png') }}" alt="menuimage">
                <img class="navbar-brand-light" src="{{ asset('frontend/assets/img/logo.png') }}" alt="menuimage">
            </a>
            <div class="navbar-collapse collapse" id="navbar-default-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="#">
                                <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="menuimage">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <i class="fas fa-times" data-toggle="collapse" role="button"
                                data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                                aria-expanded="false" aria-label="Toggle navigation"></i>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link">
                            Services
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse"
                    data-target="#navbar-default-primary" aria-controls="navbar-default-primary" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
