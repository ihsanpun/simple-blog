@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <h1>
        Post Category
    </h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/blog?category={{ $category['slug'] }}">
                        <div class="card bg-dark text-white">
                            <img src="http://source.unsplash.com/500x500?{{ $category['name'] }}" class="card-img"
                                alt="...">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5
                                    class="card-title text-center flex-fill p-4 fs-3"style="background-color:rgba(0,0,0,0.7) ">
                                    {{ $category['name'] }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
