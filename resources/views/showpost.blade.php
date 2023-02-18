@extends('layouts.home')
@section('main')
    <div class="container">
        @foreach($show as $s)
            <h1 class="text-center">{{ $s->title }}</h1>
            <h2>{{ $s->category->title }}</h2>
            <p>@foreach($s->undercategories as $uc) {{ $uc->title }}@endforeach</p>
            <p>@foreach($s->tags as $t) {{ $t->title }}@endforeach</p>
            <p>{{ $s->content }}</p>
    </div>
    @endforeach
@endsection
