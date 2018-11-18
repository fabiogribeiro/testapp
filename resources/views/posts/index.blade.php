@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach ($posts as $post)
                    <li>{{ $post->title . ': ' . $post->body }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
 
@endsection
