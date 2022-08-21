<?php

namespace App\Http\Controllers;

use App\Models\Musicsource;
use Illuminate\Http\Request;

class MusicsourceController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Music Sources";
        $viewData["musicsources"] = Musicsource::orderBy('id')->get();
        return view('musicsource.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $musicsource = Musicsource::findOrFail($id);
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - Music Source: " . $musicsource->getName();
        $viewData["musicsource"] = $musicsource;
        return view('musicsource.show')->with("viewData", $viewData);
    }
}
