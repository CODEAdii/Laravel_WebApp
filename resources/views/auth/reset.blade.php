<!-- resources/views/auth/reset.blade.php -->

@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container-fluid">

    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-4">
            <div class="card show">
                <div class="card-header bg-success">
                    <h2 class="fw-bold text-secondary text-white">Reset Password</h2>
                </div>
                <div class="card-body p-5">
                    <form class="form" action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" id="password" placeholder="New Password">
                            @error('password')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm New Password">
                        </div>
            
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-dark rounded-0">Reset Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
