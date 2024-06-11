@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('login error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('login error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            id="email" name="email"placeholder="name@example.com" required autofocus
                            value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password"name="password" placeholder="Password"
                            required autofocus>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small>
                    Not Registered? <a href="/register">Register Now!</a>
                </small>
            </main>
        </div>
    </div>
@endsection
