<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Music Styles";
        $viewData["styles"] = Style::orderBy('style')->get();
        return view('style.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $style = Style::findOrFail($id);
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - Music Style: " . $style->getStyle();
        $viewData["style"] = $style;
        return view('style.show')->with("viewData", $viewData);
    }
}
