@extends('layouts.layout')
@section('title','Dashboard page')
@section('content')

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card1 text-whiteshadow-lg p-3 mb-5 rounded">
                <div class="card-body">
                    <h2 class="card-title text-center fw-bold "> Welcome to the Dashboard</h2>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3 shadow-lg" style="height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><i class="fas fa-tachometer-alt"></i> CM Dashboard</h5>
                    <p class="card-text">Access the Chief Minister's dashboard for an overview of state operations.</p>
                    <button class="btn btn-custom mt-auto" onclick="window.location='{{ url('/cm-dashboard') }}'">Go to CM Dashboard</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3 shadow-lg" style="height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><i class="fas fa-id-card"></i> Citizen Profile</h5>
                    <p class="card-text">Manage and update citizen profiles.</p>
                    <button class="btn btn-custom mt-auto" onclick="window.location='{{ url('/citizen-profile') }}'">Go to Citizen Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow-lg" style="height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><i class="fas fa-landmark"></i> Basundhara</h5>
                    <p class="card-text">View and manage Basundhara/Patta records.</p>
                    <button class="btn btn-custom mt-auto" onclick="window.location='{{ url('/basundhara-patta') }}'">Go to Basundhara </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activities moved to the bottom -->
<div class="container-fluid ">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-light rounded">
                <div class="card-header bg-dark text-white rounded">
                    Recent Activities
                </div>
                <div class="card-body">
                    <ul class="mt-3 list-group list-group-flush">
                        <li class="list-group-item">User <b>{{ auth()->user()->name }}</b> logged in</li>
                       
                        <li class="list-group-item">
                            @if($firstUploadedTime)
                            <p><b>{{ auth()->user()->name }}'s</b>  uploaded file at :- <span class="text-primary">{{ $firstUploadedTime }}</span></p>
                             @endif
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
