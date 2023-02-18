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
                    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                        <div class="col d-flex align-items-start">
                            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
                            </div>
                            <div>
                                <ul style="list-style-type: square !important; padding: 10px !important;">
                                @foreach($categories as $category)
                                    <li>
                                        {{' (id: ' . $category->id . ') ' . $category->title}}
                                    </li>
                                    <ul style="list-style-type: circle !important; padding: 15px !important;">
                                        @foreach($category->underCategories as $uc)
                                            @if($category->id == $uc->category_id)
                                                    <li>{{ $uc->title }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                                </ul>
                                <a href="{{ route('category.index') }}" class="navbar-brand">Back</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
