<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Programmes;
use App\Models\viewConcertProgramme;
use Illuminate\Http\Request;

class ConcertController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Concerts";
        $viewData["concerts"] = Concert::orderBy('concert_date_time', 'desc')
            ->where('display', '=' ,1)
            ->get();
        return view('concert.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $concert = Concert::findOrFail($id);
        $concert_programme = viewConcertProgramme::where('concert_id', '=', $id)
            ->orderBy('order', 'asc')
            ->get();
        $viewData['num_concert_pieces'] = $concert_programme->count();
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "CONCERT";
        $viewData["concert"] = $concert;
        $viewData["programme"] = $concert_programme;
        return view('concert.show')->with("viewData", $viewData);
    }   
}
