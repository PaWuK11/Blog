<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="g-4 py-5 row-cols-1 row-cols-lg-3">
                        <div class="container">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div>
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <label for="title">Category Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}">
                                    <button class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                                <div>
                                    <form action="{{ route('category.store') }}" method="POST">
                                        @csrf
                                        <label for="title">Under category Title</label>
                                        <input type="text" name="title" id="title" value="{{ old('title') }}">
                                        <select class="form-select" aria-label="Default select example" name="category_id">
                                            <option>Open this select menu</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <div>
                                <a href="{{ route('category.all') }}" class="navbar-brand">Show category and under category</a>
                                </div>
                                <a href="{{ route('category.index') }}" class="navbar-brand">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
