<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="col-md-8">
                        @foreach($posts as $post)
                        <article class="blog-post">
                            <h3 class="blog-post-title font-weight-bold">Author:</h3>
                            <p>{{ $post->user->name }}</p>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Title:</h4>
                            <p>{{ $post->title }}</p>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Description:</h4>
                            <p>{{ $post->description }}</p>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Content:</h4>
                            <p>{{ $post->content }}</p>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Category:</h4>
                            <p>{{ $post->category->title }}</p>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Under categories:</h4>
                            <ul>
                                @foreach($post->undercategories as $uc)<li>{{ $uc->title }}</li>@endforeach
                            </ul>
                            <hr>
                            <h4 class="blog-post-title font-weight-bold">Tags:</h4>
                            <ul>
                                @foreach($post->tags as $t)<li>{{ $t->title }}</li>@endforeach
                            </ul>
                            <h4 class="blog-post-title font-weight-bold">Tags:</h4>
                            <ul>
                                @foreach($post->tags as $t)<li>{{ $t->title }}</li>@endforeach
                            </ul>
                            <h4 class="blog-post-title font-weight-bold">Key Words:</h4>
                            <ul>
                                @foreach($post->keyWords as $w)<li>{{ $w->word }}</li>@endforeach
                            </ul>
                            <hr>
                            <h5>Created at:</h5>
                            <p class="blog-post-meta">{{ $post->created_at }}</p>
                            <hr>
                            <form action="{{ route('postApprove.store') }}"
                                  method="post" >
                                @csrf
                                <td>
                                    <input type="hidden" name="approved" value="1">
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <button class="btn btn-xs btn-info">Submit</button>
                                </td>
                            </form>

                            <form action="{{ route('postApprove.drop') }}"
                                  method="post" >
                                @method('delete')
                                @csrf
                                <td>
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <input type="hidden" name="author_id" value="{{ $post->user_id }}">
                                    <button class="btn btn-xs btn-danger">Decline</button>
                                </td>
                            </form>
                            <hr>
                            <hr>
                        </article>
                        @endforeach
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
