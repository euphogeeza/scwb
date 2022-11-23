@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="text-center">
    <div class="container">
        <div class="row mb-4">
            <h2>{{ $viewData["subtitle"] }}</h2>
        </div>
        <div class="row">
            <div class="programme_piece_title">
                VENUE: {{ $viewData["concert"]->getVenue() }}
            </div>
            <div class="row">
                <div class="programme_piece_title">
                    {{ $viewData["concert"]->getSubTitle() }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="programme_piece_composer">
                {{ $viewData["concert"]->getConcertDateTime() }}
            </div>
        </div>
    </div>

    <?php
    if( $viewData["concert"]->getDisplayProgramme() == 1  && $viewData["num_concert_pieces"] > 0 ) {
    ?>    
    
    <div class="container">
        <div class="row mb-4 mt-4">
            <h2>~~~ PROGRAMME ~~~</h2>
        </div>
        @foreach($viewData["programme"] as $piece)
        <div class="row mb-4">
            <div class="programme_piece_title">{{ $piece->style != "-" ? $piece->style . ": " : '' }} {{ $piece->title }}</div>
            <div class="programme_piece_composer">
                {{ $piece->CompArrStr != "" ? $piece->CompArrStr: ''}}
            </div>
            <div class="programme_piece_soloist"><em>{{ $piece->soloist ? "Soloist: " . $piece->soloist : '' }}</em></div>
        </div>
        @endforeach
    </div>

    <?php
    }
    ?>    

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