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
                            <form action="{{ route('tags.store') }}" method="post">
                                @csrf
                                <label for="title">Tag's title:</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}">
                                <button class="btn btn-primary">Submit</button>
                            </form>
                                <label for="tags">See all existing tags:</label>
                                <select id="tags">
                                    @foreach($tags as $tag)
                                    <option>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
