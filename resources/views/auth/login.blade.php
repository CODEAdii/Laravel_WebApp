@extends('layouts.app')

@section('title', 'Login Page')

@section('content')
<div class="container-fluid">

    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card show ">
                <div class="card-header bg-primary">
                    <h2 class="fw-bold text-secondary text-white">Login</h2>
                </div>
                <div class="card-body p-5">
                    <form class="form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input class="form-control rounded-0" type="password" name="password" id="password" placeholder="Password">
                                <button type="button" class="btn btn-outline-secondary" id="showPasswordBtn"><i class="bi bi-eye"></i></button> <!-- Eye icon button -->
                            </div>
                            @error('password')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('forgot.password') }}" text-decoration-none>Forgot Password?</a>
                        </div>

                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-dark rounded-0">Login</button>
                        </div>
                        <div class="text-center text-secondary">
                            <p>Create an account? <a href="{{route("register")}}">SignUp</a></p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
