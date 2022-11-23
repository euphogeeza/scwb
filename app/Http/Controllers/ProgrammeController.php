<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{

    public function index()
    {
        // $viewData = [];
        // $viewData["title"] = "Snowdown Colliery Welfare Band";
        // $viewData["subtitle"] = "Library - List of Programmes";
        // $viewData["programme"] = Programmes::all();
        // return view('programme.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        // $viewData = [];
        // $viewData["title"] = "Snowdown Colliery Welfare Band";
        // $programme = Programmes::findOrFail($id);
        // $viewData["subtitle"] = "Library - Concert Programme: " . $programme->getConcertId();
        // $viewData["programme"] = $programme->getProgramme();
        // return view('programme.show')->with("viewData", $viewData);
    }
}
