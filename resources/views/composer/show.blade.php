@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header"><h2>Composer Information</h2></div>
    <div class="card-body">
        <p>Lastname: {{  $viewData["composer"]->getLastname() }}</p>
        <p>Firstname: {{  $viewData["composer"]->getFirstname() }}</p>
    </div>
</div>
<div class="card">
    <div class="card-header">Music in Library COMPOSED by {{ $viewData["composer"]->getFirstname() . " " . $viewData["composer"]->getLastname() }}</div>
    <div class="card-body">
        <ul>
            @foreach($viewData["music_composed_by"] as $piece)
            <li>{{ $piece->title }}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="card">
    <div class="card-header">Music in Library ARRANGED by {{ $viewData["composer"]->getFirstname() . " " . $viewData["composer"]->getLastname() }}</div>
    <div class="card-body">
        <ul>
            @foreach($viewData["music_arranged_by"] as $piece)
            <li>{{ $piece->title }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
@section('sidebar')
<div class="text-center">
    <div style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col">[ SEARCH PANEL ]</div>
            </div>
            <div class="row">
                <div class="col sm-1 lg-4">
                    <<___Search_Criteria_Field___>>
                </div>
                <div class="col sm-1 lg-4">
                    [SEARCH BUTTON]
                </div>
            </div>
        </div>
    </div>
    <div style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col">[ CALENDAR PANEL ]</div>
            </div>
            <div class="row">
                <div class="col sm-1 lg-4">
                    Date / Time
                </div>
                <div class="col sm-1 lg-4">
                    Location
                </div>
            </div>
        </div>
    </div>
    <div style="min-height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col">[ TWITTER PANEL ]</div>
            </div>
            <div class="row">
                <div class="col sm-1 lg-4">
                    Pre-defined Twitter code
                </div>
            </div>
        </div>
    </div>
</div>
@endsection