@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Music
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error) 
            <li> - {{  $error }}</li>
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
                            <input name="title" value="{{ $viewData["music"]->getTitle() }}" type="text" class="form-control">
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
                                <option value="{{ $composer['id'] }}" {{ $composer['id'] == $viewData["music"]->getComposerId() ? 'selected' : '' }}>
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
                                <option value="{{ $composer['id'] }}" {{ $composer['id'] == $viewData["music"]->getArrangerId() ? 'selected' : '' }}>
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
                                <option value="{{ $style['id'] }}" {{ $style['id'] == $viewData["music"]->getStyleId() ? 'selected' : '' }}>
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
                            <input name="soloist" value="{{ $viewData["music"]->getSoloist() }}" type="text" class="form-control">
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
                            <select name="in_pad" id="in_pad" class="form-control" value="{{ $viewData["music"]->getInPad() }}">
                                <option value="0" {{ $viewData["music"]->getInPad() == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $viewData["music"]->getInPad() == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-form-label">Envelope:</label>
                        <div class="col-lg-9 col-md-3 col-sm-12">
                            <input name="envelope" value="{{ $viewData["music"]->getEnvelope() }}" type="text" class="form-control">
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
                            <input name="notes" value="{{ $viewData["music"]->getNotes() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
</div>
@endsection