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
                        <div class="col d-flex justify-content-around">
                            <div>
                                <h3>Show categories/under categories</h3>
                                <a href="{{ route('category.all') }}" class="btn btn-primary">
                                    Show
                                </a>
                            </div>
                            <div>
                                <h3>Create categories</h3>
                                <a href="{{ route('category.create') }}" class="btn btn-primary">
                                    Create
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
