@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Composer
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error) 
            <li> - {{  $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.composer.update', ['id'=> $viewData['composer']->getId()]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">First Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="firstname" value="{{  $viewData['composer']->getFirstname() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Last Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="lastname" value="{{  $viewData['composer']->getLastname() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection