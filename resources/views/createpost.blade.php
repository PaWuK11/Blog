<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Createpost') }}
        </h2>
    </x-slot>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3" style="flex-direction: column;">
                            <div class="col-sm-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder=""
                                       value="{{ old('title') }}">
                            </div>

                            <div class="col-sm-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder=""
                                       value="{{ old('description') }}">
                            </div>

                            <div class="col-8">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="summernote" rows="3">{{ old('content') }}</textarea><br>
                            </div>
                            <div class="mb-3 col-6">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option>Select a Category</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3" >
                                <label for="undercategory_id">Select under categories:</label>
                                <select class="form-select" name="undercategories[]" multiple id="undercategory_id">
                                    @foreach($underCategories as $underCategory)
                                        <option
                                            value="{{ $underCategory->id }}" >{{ $underCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-3" >
                                <label for="tag-select">Select Tags: </label>
                                <select class="form-select" name="tags[]" multiple id="tag-select">
                                    @foreach($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}" >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                    <input type="file" name="chooseFile" id="chooseFile">
                                </div>
                            </div>
                            <div class="mb-3 col-3" >
                                <label for="words"><strong>Add key words for searching:</strong></label>
                                    <input type="text" name="keyWords[]" multiple id="words" class="mb-1">
                                    <input type="text" name="keyWords[]" multiple id="words" class="mb-1">
                                    <input type="text" name="keyWords[]" multiple id="words" class="mb-1">
                            </div>
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




