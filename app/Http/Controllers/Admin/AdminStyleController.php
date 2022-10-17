<?php

namespace App\Http\Controllers\Admin;

use App\Models\Style;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStyleController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Styles - Snowdown Colliery Welfare Band";
        $viewData["styles"] = Style::all();
        return view('admin.style.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "style" => "required|max:255",
        ]);

        $newStyle = new Style();
        $newStyle->setStyle($request->input('style'));
        $newStyle->save();
        
        return back();
    }

    public function delete($id)
    {
        Style::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Style - Snowdown Colliery Welfare Band";
        $viewData["style"] = Style::findOrFail($id);
        return view('admin.style.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "style" => "required|max:255",
        ]);

        $style = Style::findOrFail($id);
        $style->setStyle($request->input('style'));
        $style->save();

        return redirect()->route('admin.style.index');
    }
}
