@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Musical Styles
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li> - {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.style.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Musical Style:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="style" value="{{ old('style') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">Manage Musical Styles</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Style</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["styles"] as $style)
                <tr>
                    <td>{{ $style->getId() }}</td>
                    <td>{{ $style->getStyle() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.style.edit', ['id'=> $style->getId()]) }}">
                            <i class="bi-pencil"> </i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.style.delete', $style->getId()) }}" method="POST">
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