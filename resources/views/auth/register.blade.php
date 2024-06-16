@extends('layouts.app')
@section('title','Register Page')
@section('content')

<div class="row d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-4">
        <div class="card show">
            <div class="card-header bg-primary">
                <h2 class="fw-bold text-secondary text-white">Register</h2>
            </div>
            <div class="card-body p-5">

                <form class="form" action="{{ route('register') }}" method="post"> <!-- Corrected form action -->
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}"> <!-- Keep old input -->
                        @error("name")
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}"> <!-- Keep old input -->
                        @error("email")
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}"> <!-- Keep old input -->
                        @error("phone")
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" value="{{ old('password') }}">
                            <button type="button" class="btn btn-outline-secondary" id="showPasswordBtn"><i class="bi bi-eye"></i></button> <!-- Eye icon button -->
                        </div>
                        @error("password")
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="input-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control" value="{{ old('password_confirmation') }}"> <!-- Keep old input -->
                        <button type="button" class="btn btn-outline-secondary" id="showPasswordBtn"><i class="bi bi-eye"></i></button> <!-- Eye icon button -->
                        </div>
                        @error('password_confirmation')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-dark rounded-0">Register</button>
                    </div>
                    <div class="text-center text-secondary">
                        <p>Already have an account? <a href="{{route("login")}}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
