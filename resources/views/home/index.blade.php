@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
    Welcome to the Snowdown Colliery Welfare Bands Website.
</div>
<div class="container">
    <div class="row">
        <div class="col lg-12">
            <h1>Story Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col lg-8">
            <p>Date: </p>
        </div>
        <div class="col lg-4">
            <p>Another label:</p>
        </div>
    </div>
    <div class="row">
        <div class="col lg-12">
            <p>Image for story goes here</p>
        </div>
    </div>
    <div class="row">
        <div class="col lg-12">
            <p>Body of story goes here</p>
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