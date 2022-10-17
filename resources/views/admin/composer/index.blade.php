@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Composer / Arranger
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li> - {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.composer.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">First Name:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="firstname" value="{{ old('firstname') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Last Name:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="lastname" value="{{ old('lastname') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">Manage Composers / Arrangers</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["composers"] as $composer)
                <tr>
                    <td>{{ $composer->getId() }}</td>
                    <td>{{ $composer->getFirstname() }}</td>
                    <td>{{ $composer->getLastname() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.composer.edit', ['id'=> $composer->getId()]) }}">
                            <i class="bi-pencil"> </i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.composer.delete', $composer->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"> </i>
                            </button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection