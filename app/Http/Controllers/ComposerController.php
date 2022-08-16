<?php

namespace App\Http\Controllers;

use App\Models\Composer;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    //public static $composers = [
    //    ["id"=>"1","firstname"=>"Wolfgang A.","lastname"=>"Mozart"],
    //    ["id"=>"2","firstname"=>"T.J.","lastname"=>"Powell"],
    //    ["id"=>"3","firstname"=>"Kenneth J.","lastname"=>"Alford"],
    //    ["id"=>"4","firstname"=>"R.B.","lastname"=>"Hall"]
    //];

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - List of Composers";
        //$viewData["composers"] = ComposerController::$composers;
        $viewData["composers"] = Composer::orderBy('lastname')->get();
        return view('composer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        // $composer = ComposerController::$composers[$id-1];
        $composer = Composer::findOrFail($id);
        $viewData["title"] = "Snowdown Colliery Welfare Band";
        $viewData["subtitle"] = "Library - Composer: " . $composer->getComposer();
        $viewData["composer"] = $composer;
        return view('composer.show')->with("viewData", $viewData);
    }
}
