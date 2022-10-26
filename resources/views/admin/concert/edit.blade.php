@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Concert
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error) 
            <li> - {{  $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.concert.update', ['id'=> $viewData['concert']->getId()]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Venue:</label>
                        <div class="col-lg-11 col-md-6 col-sm-12">
                            <input name="venue" value="{{  $viewData['concert']->getVenue() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Date/Time:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="concert_date_time" value="{{  $viewData['concert']->getConcertDateTime() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Subtitle:</label>
                        <div class="col-lg-11 col-md-6 col-sm-12">
                            <input name="subtitle" value="{{  $viewData['concert']->getSubtitle() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Display Concert:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="display" class="form-control">
                                <option value="1" {{ $viewData['concert']->getDisplay() == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $viewData['concert']->getDisplay() == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Display Programme:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="display_programme" class="form-control">
                                <option value="1" {{ $viewData['concert']->getDisplayProgramme() == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $viewData['concert']->getDisplayProgramme() == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection