@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="text-center">
    <div class="container">
        <div class="row">
            <h1>List of All Concerts</h1>
        </div>
        <?php 
        $year = 0; 
        $month = "";
        ?>
        @foreach ($viewData["concerts"] as $concert)
            <?php
            if($year!=$concert->getConcertYear()){
                $year = $concert->getConcertYear();
                ?>
                <div class="row">{{ $concert->getConcertYear() }}</div>
                <?php
            }
            if($month!=$concert->getConcertMonth()){
                $month = $concert->getConcertMonth();
                ?>
                <div class="row">{{ $concert->getConcertMonth() }}</div>
                <?php
            }
            ?>
            <div class="row">
                <div class="col lg-1 md-2 sm-2">
                    {{ $concert->getConcertDate() }}
                </div>
                <div class="col lg-1 md-2 sm-2">
                    {{ $concert->getConcertTime() }}
                </div>
                <div class="col lg-2 md-8 sm-8">
                    <a href="{{ route('concert.show', ["id"=>$concert->getId()]) }}">
                        {{ $concert->getVenue() }}
                    </a>
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