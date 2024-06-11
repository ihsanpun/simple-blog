@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{ $post['title'] }}</h2>
                <p>By : <a href="/blog?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a
                        href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    {{ $post->created_at->diffForHumans() }}
                </p>
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="http://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                @endif
                <article class="my-3">
                    {!! $post['body'] !!}
                </article>


                <a href="/blog">back to posts</a>
            </div>
        </div>
    </div>
@endsection
