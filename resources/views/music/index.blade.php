@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="text-center">
    <div class="container">
        <div class="row">
            <h1>List of All Music in Library</h1>
        </div>
        @foreach ($viewData["music"] as $piece)
        <div class="row">
            <div class="col">
                <a href="{{ route('music.show', ["id"=>$piece->getId()]) }}">
                    {{ $piece->getTitle() }}
                </a>
            </div>
            <div class="col">
                {{ $piece->getComposerId() }} / {{ $piece->getArrangerId() }}
            </div>
        </div>
        @endforeach
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