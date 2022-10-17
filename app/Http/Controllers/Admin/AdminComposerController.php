<?php

namespace App\Http\Controllers\Admin;

use App\Models\Composer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminComposerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Composers - Snowdown Colliery Welfare Band";
        $viewData["composers"] = Composer::all();
        return view('admin.composer.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "firstname" => "max:255",
            "lastname" => "required|max:255",
        ]);

        $newComposer = new Composer();
        
        if (null==$request->input('firstname')) {
            $newComposer->setFirstname(' ');
        } else {
            $newComposer->setFirstname($request->input('firstname'));
        }

        $newComposer->setLastname($request->input('lastname'));
        $newComposer->save();
        
        return back();
    }

    public function delete($id)
    {
        Composer::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Composer - Snowdown Colliery Welfare Band";
        $viewData["composer"] = Composer::findOrFail($id);
        return view('admin.composer.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "firstname" => "max:255",
            "lastname" => "required|max:255",
        ]);

        $composer = Composer::findOrFail($id);
        if (null==$request->input('firstname')) {
            $composer->setFirstname(' ');
        } else {
            $composer->setFirstname($request->input('firstname'));
        }

        $composer->setLastname($request->input('lastname'));
        $composer->save();

        return redirect()->route('admin.composer.index');
    }
}
