<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
                <h5 class="text-white">Tag's catalog:</h5>
                <nav class="nav flex-column">
                    @foreach($tagsCloud as $tag)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('tags.show', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
                        </li>
                    @endforeach
                </nav>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
                <h5 class="text-white">Categories:</h5>
                <ul>
                    @foreach($categories as $category)
                        <li class="list-group-item"><a class="nav-link"
                                                       href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                        </li>
                        <ul>
                            @foreach($category->underCategories as $uc)
                                @if($category->id == $uc->category_id)
                                    <li class="list-group-item"><a class="nav-link"
                                                                   href="{{ route('undercategory.show', ['category' => $category->slug, 'slug' => $uc->slug]) }}">{{ $uc->title }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary text-white"><strong>Home</strong></a>
                </li>
                @if(Auth::check())
                <li><a href="{{ route('dashboard') }}" class="nav-link px-2 text-white">Dashboard</a></li>
                @endif
                {{--                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>--}}
                {{--                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>--}}
                {{--                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>--}}
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="get" action="{{ route('search') }}">
                <input type="search" class="form-control form-control-dark" placeholder="Search..."
                       aria-label="Search" name="search_query">
            </form>
            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light me-2">Logout</button>
                    </form>
            <div class="text-end">
                    @else
                        <button type="button" class="btn btn-outline-light me-2"><a href="{{ route('login') }}"
                                                                                    class=" text-decoration-none text-light">Login</a>
                        </button>
                    @endauth
                @endif
                <button class="navbar-dark navbar-toggler p-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarHeader"
                        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
</header>
