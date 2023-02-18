@extends('layouts.home')
@section('main')
    <div class="album py-5 bg-light">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($posts as $post)
                    @if($post->approved)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->title }}</text></svg>

                                <div class="card-body">
                                    <p class="card-text">{{ $post->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a class="text-decoration-none text-secondary" href="{{ route('home.post', ['title' => $post->slug, 'category' => $post->category->slug]) }}">View</a></button>
                                            @if(Auth::check() && auth()->user()->is_admin)
                                                <button type="button" class="btn btn-sm btn-outline-secondary"><a class="text-decoration-none text-secondary" href="{{ route('home.post.edit', ['id'=> $post->id]) }}">Edit</a></button>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $post->getData() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
@endsection
