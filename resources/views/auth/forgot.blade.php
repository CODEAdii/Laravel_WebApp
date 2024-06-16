@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card show">
                <div class="card-header bg-danger">
                    <h2 class="fw-bold text-secondary text-white">Forgot Password</h2>
                </div>
                <div class="card-body p-5">
                    <form class="form" action="{{ route('forgot') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-dark rounded-0">Send Reset Link</button>
                        </div>
                        <div class="mb-3 d-grid">
                            <p>Create an account? <a href="{{route("register")}}">SignUp</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
