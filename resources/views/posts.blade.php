@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <h1 class="text-center">{{ $title }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-2">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search" name="search"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="http://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <a href="/blog/{{ $posts[0]->slug }}">
                    <h5 class="card-title text-dark">{{ $posts[0]->title }}</h5>
                </a>
                <small class="text-muted">
                    <p>By : <a href="/blog?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a> in <a
                            href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                </small>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-primary">
                    <h5>Read more</h5>
                </a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">
                                <div class="position-absolute px-3 py-2 text-white"
                                    style="background-color:rgba(0,0,0, 0.7)">
                                    {{ $post->category->name }}</div>
                            </a>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                    alt="{{ $post->category->name }}">
                            @else
                                <img src="http://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"></h5>{{ $post['title'] }}
                                <small class="text-muted">
                                    <p>By : <a href="/blog?user={{ $post->user->username }}">{{ $post->user->name }}</a>
                                        in
                                        <a
                                            href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </small>
                                <p class="card-text">{{ $post['excerpt'] }}</p>
                                <a href="/blog/{{ $post['slug'] }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $posts->links() }}
    @else
        <p class="text-center fs-4">No Post Found..</p>
    @endif
@endsection
