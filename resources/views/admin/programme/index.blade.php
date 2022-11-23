@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Programme
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li> - {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.programme.index') }}">
        @csrf
        <!-- ROW 1 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Concert:</label>
                    <div class="col-lg-11 col-md-6 col-sm-12">
                        <select name="concert_id" value="{{ old('id') }}" type="text" class="form-control">
                            @foreach ($viewData['concerts'] as $concert)
                            <option value="{{ $concert['concert_id'] }}" {{ $concert['concert_id'] == old('concert_id') ? 'selected' : '' }}>
                                {{ $concert['venue'] }} - {{ $concert['concert_date_time'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">SELECT</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">Manage Programme</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["music"] as $piece)
                <tr>
                    <td>{{ $piece->getId() }}</td>
                    <td>{{ $piece->getTitle() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.music.edit', ['id'=> $piece->getId()]) }}">
                            <i class="bi-pencil"> </i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.music.delete', $piece->getId()) }}" method="POST">
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