<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Concerts";
        //$viewData["concerts"] = ConcertController::$concerts;
        $viewData["concerts"] = Concert::orderBy('concert_date_time', 'desc')->get();
        return view('concert.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        // $concert = ConcertController::$concert[$id-1];
        $concert = Concert::findOrFail($id);
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - concert: " . $concert->getVenue() . " at " . $concert->getConcertTime();
        $viewData["concert"] = $concert;
        return view('concert.show')->with("viewData", $viewData);
    }
}
