<!-- HEADER -->
    <header id="header" >
        <!-- LOGO -->
        <a href="index.html" class="logo">
            <img src="/img/logo.png" class="logo-dark" alt="">
            <img src="/img/logo-light.png" class="logo-light" alt="">
        </a>
        <!-- MOBILE MENU ICON -->
        <a href="#" class="mob-menu"><i class="fa fa-bars"></i></a>
        <!-- MENU -->
        <nav>
            <ul class="main-menu">
                <li>
                    <a href="/" @if(\Request::is('/')) class="active" @endif>home</a>
                </li>
                {{-- <li>
                    <a href="portfolio-3-cols.html">portfolio</a>
                </li> --}}
                <li>
                    <a href="/galery" @if(\Request::is('galery')) class="active" @endif>gallery</a>
                </li>
                <li>
                    <a href="about-us.html">about</a>
                    <ul>
                        <li><a href="about-us.html">about us</a></li>
                        <li><a href="about-me.html">about me</a></li>
                        <li><a href="about-minimal.html">about minimal</a></li>
                    </ul>
                </li>
                <li>
                    <a href="blog-boxed.html">blog</a>
                    <ul>
                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                        <li><a href="blog-boxed.html">blog boxed</a></li>
                        <li><a href="blog-post.html">blog post</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact-us.html">contact</a>
                    <ul>
                        <li><a href="contact-us.html">contact us</a></li>
                        <li><a href="contact-me.html">contact me</a></li>
                        <li><a href="contact-minimal.html">contact minimal</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
<!-- /HEADER -->