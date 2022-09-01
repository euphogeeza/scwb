@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="text-center">
    <div class="container">
        <div class="row">
            <h1>{{ $viewData["subtitle"] }}</h1>
            <h2>Title: {{  $viewData["piece"]->getTitle() }}</h2>
            <p>Composer: {{  $viewData["piece"]->getComposerId() }}</p>
            <p>Arranger: {{  $viewData["piece"]->getArrangerId() }}</p>
            <p>Soloist: {{  $viewData["piece"]->getSoloist() }}</p>
            <p>Style: {{  $viewData["piece"]->getStyleId() }}</p>
            <p>Envelope #: {{  $viewData["piece"]->getEnvelope() }}</p>
            <p>In Current Reportoire: {{  $viewData["piece"]->getInPad() }}</p>
            <p>Notes#: {{  $viewData["piece"]->getNotes() }}</p>
        </div>
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