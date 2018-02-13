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
                <!-- <li>
                    <a href="portfolio-3-cols.html">portfolio</a>
                </li> -->
                <li>
                    <a href="#" @if(\Request::is('galery') || \Request::is('galery/*')) class="active" @endif>gallery</a>
                    <ul>
                        <li><a href="/galery/indoor">Indoor</a></li>
                        <li><a href="/galery/outdoor">Outdoor</a></li>
                        <li><a href="/galery/wedding">Wedding</a></li>
                        <li><a href="/galery/object">Object</a></li>
                        <li><a href="/galery/view">View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/about-us" @if(\Request::is('about-us')) class="active" @endif>about</a>
                </li>
                <!-- <li>
                    <a href="blog-boxed.html">blog</a>
                    <ul>
                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                        <li><a href="blog-boxed.html">blog boxed</a></li>
                        <li><a href="blog-post.html">blog post</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="/contact-us" @if(\Request::is('contact-us')) class="active" @endif>contact</a>
                </li>
            </ul>
        </nav>
    </header>
<!-- /HEADER -->
