@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Music
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li> - {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.music.store') }}">
        @csrf
        <!-- ROW 1 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Title:</label>
                    <div class="col-lg-11 col-md-6 col-sm-12">
                        <input name="title" value="{{ old('title') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW 2 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Composer:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <select name="composer_id" id="composer_id" class="form-control">
                            @foreach ($viewData['composers'] as $composer)
                            <option value="{{ $composer['id'] }}" {{ $composer['id'] == old('composer_id') ? 'selected' : '' }}>
                                {{ $composer['id'] == 1 ? '-' : $composer['lastname'] . ', ' . $composer['firstname'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Arranger:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <select name="arranger_id" id="arranger_id" class="form-control">
                            @foreach ($viewData['composers'] as $composer)
                            <option value="{{ $composer['id'] }}" {{ $composer['id'] == old('arranger_id') ? 'selected' : '' }}>
                                {{ $composer['id'] == 1 ? '-' : $composer['lastname'] . ', ' . $composer['firstname'] }}
                            </option>
                            @endforeach
                        </select>
                </div>
                </div>
            </div>
        </div>
        <!-- ROW 3 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Style:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <select name="style_id" id="style_id" class="form-control">
                            @foreach ($viewData['styles'] as $style)
                            <option value="{{ $style['id'] }}" {{ $style['id'] == old('style_id') ? 'selected' : '' }}>
                                {{ $style['id'] == 1 ? '-' : $style['style'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Soloist:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <input name="soloist" value="{{ old('soloist') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW 4 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">In Pad?:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <select name="in_pad" id="in_pad" class="form-control">
                            <option value="0" {{ old('in_pad') == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('in_pad') == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Envelope:</label>
                    <div class="col-lg-9 col-md-3 col-sm-12">
                        <input name="envelope" value="{{ old('envelope') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW 5 -->
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Notes:</label>
                    <div class="col-lg-11 col-md-6 col-sm-12">
                        <input name="notes" value="{{ old('notes') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">SAVE</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">Manage Music</div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">Composer</th>
                    <th scope="col">Arranger</th>
                    <th scope="col">Style</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["music"] as $piece)
                <tr>
                    <td>{{ $piece->getId() }}</td>
                    <td>{{ $piece->getTitle() }}</td>
                    {{-- <td>{{ $piece->getComposerId() }}</td>
                    <td>{{ $piece->getArrangerId() }}</td>
                    <td>{{ $piece->getStyleId() }}</td> --}}
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