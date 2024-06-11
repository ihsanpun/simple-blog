<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ $active === 'about me' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ $active === 'blog' ? 'active' : '' }}" href="/blog">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li><a class="nav-link" href="/dashboard"> Welcome back, {{ auth()->user()->name }}</a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link"><i class="bi bi-box-arrow-right"></i>
                                Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
