<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Music";
        $viewData["music"] = Music::orderBy('title')->get();
        return view('music.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $piece = Music::findOrFail($id);
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - Music: " . $piece->getTitle();
        $viewData["piece"] = $piece;
        return view('music.show')->with("viewData", $viewData);
    }
}
