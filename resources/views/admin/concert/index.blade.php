@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Concert
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li> - {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.concert.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-1 col-md-6 col-sm-12 col-form-label">Venue:</label>
                    <div class="col-lg-11 col-md-6 col-sm-12">
                        <input name="venue" value="{{ old('venue') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Date/Time:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="concert_date_time" value="{{ old('concert_date_time') }}" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Subtitle:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="subtitle" value="{{ old('subtitle') }}" type="text" class="form-control">
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
                            <option value="1" {{ old('display') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('display') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Display Programme:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <select name="display_programme" class="form-control">
                            <option value="1" {{ old('display_programme') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('display_programme') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">Manage Concerts</div>
    <div class="card-body">
        <div class="mb-3">
            {!! $viewData['concerts']->links(); !!}
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Venue</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["concerts"] as $concert)
                <tr>
                    <td>{{ $concert->getId() }}</td>
                    <td>{{ $concert->getConcertDateTime() }}</td>
                    <td>{{ $concert->getVenue() }}<br /><em>{{ $concert->getSubtitle() == '' ? '' : $concert->getSubtitle() }}</em></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.concert.edit', ['id'=> $concert->getId()]) }}">
                            <i class="bi-pencil"> </i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.concert.delete', $concert->getId()) }}" method="POST">
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
        <div class="mb-3">
            {!! $viewData['concerts']->links(); !!}
        </div>        
    </div>
</div>
@endsection