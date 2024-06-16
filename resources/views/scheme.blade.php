@extends('layouts.layout')
@section('title', 'Profile page')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            @if (session('status'))
            <div class='alert alert-success'>{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header bg-warning">
                    <h4>Import Excel Data</h4>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('scheme') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="import_file" class="form-control"/>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                    @if($schemes->isNotEmpty())
                    <form action="{{ route('scheme.clear') }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Clear Data</button>
                    </form>
                      @if($firstUploadedTime)
                            <p>First uploaded time: {{ $firstUploadedTime }}</p>
                        @endif
                    <hr>
                    <div class="container">
                        <div class="table-responsive small-table">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Scheme Code</th>
                                        <th scope="col">Scheme Name</th>
                                        <th scope="col">Central/State Scheme</th>
                                        <th scope="col">Financial Year</th>
                                        <th scope="col">State Disbursement</th>
                                        <th scope="col">Central Disbursement</th>
                                        <th scope="col">Total Disbursement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schemes as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->scheme_code }}</td>
                                        <td>{{ $item->scheme_name }}</td>
                                        <td>{{ $item->central_state_scheme }}</td>
                                        <td>{{ $item->fin_year }}</td>
                                        <td>{{ $item->state_disbursement }}</td>
                                        <td>{{ $item->central_disbursement }}</td>
                                        <td>{{ $item->total_disbursement }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <p>No data available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

