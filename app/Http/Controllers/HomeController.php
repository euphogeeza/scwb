<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band - Latest News";
        return view('home.index')->with("viewData", $viewData);
    }
}
