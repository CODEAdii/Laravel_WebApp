

@extends('layouts.layout')
@section('title', 'Profile page')
@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card show">
                <div class="card-header d-flex justify-content-between align-items-center bg-primary ">
                    <h2 class="text-secondary fw-bold text-white">User Profile</h2>
                </div>
                <div class="card-body p-5 bg-wa">
                    <div class="row">
                        <div class="col-lg-4 px-5 text-center" style="border-right:1px solid #999">
                            <!-- Use asset helper function to get the correct URL -->
                            <img src="{{ asset('images/dp.jpg') }}" alt="" class="img-fluid rounded-circle img-thumbnail" width="200">
                            <label for="picture">Change Profile Picture</label>
                            <input type="file" name="picture" id="picture" class="form-control rounded-pill">
                        </div>
                        <div class="col-lg-8 px-5">
                            <form method="post" action="{{ route('profile') }}"> <!-- Updated action -->
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') ?? auth()->user()->name }}" class="form-control">
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" disabled>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') ?? auth()->user()->phone }}" class="form-control">
                                    @error('phone')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-dark">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#picture").change(function(e){
            const file = e.target.files[0];
            let url = URL.createObjectURL(file);
            $("#image_preview").attr('src', url);
        });
    });
</script>
@endsection
