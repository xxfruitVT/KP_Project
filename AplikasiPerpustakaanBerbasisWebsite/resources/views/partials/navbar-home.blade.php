<div id="header-wrap">
    <header id="header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-2">
                    <div class="main-logo">
                        <img src="https://blog-eperpus.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2021/01/13044959/logo-eperpus-300x82.png" alt="logo" class="logo" width="150">
                    </div>

                </div>

                <div class="col-md-10">

                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item active"><a href="#home">Home</a></li>

                                @auth
                                <li class="menu-item"><a href="{{ route('dashboard.index') }}" class="nav-link btn btn-outline-dark rounded-pill m-0">Dashboard</a></li>
                                @else
                                <li class="menu-item"><a href="{{ route('login') }}" class="nav-link btn btn-outline-dark rounded-pill m-0">Masuk</a></li>
                                @endauth
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>

            </div>
        </div>
    </header>

</div><!--header-wrap-->
