@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2>{{ $post['title'] }}</h2>
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="http://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                @endif
                <a href="/dashboard/posts"class="btn btn-success mt-3"><span data-feather="arrow-left"></span> To My
                    Posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mt-3"> <span
                        data-feather="edit"></span>edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post"class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mt-3" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span> Delete</button>
                </form>
                <article class="my-3">

                    {!! $post['body'] !!}
                </article>
            </div>
        </div>
    </div>
@endsection
