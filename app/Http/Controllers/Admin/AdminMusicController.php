<?php

namespace App\Http\Controllers\Admin;

use App\Models\Music;
use App\Models\Composer;
use App\Models\Style;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMusicController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Music - Snowdown Colliery Welfare Band";
        $viewData["music"] = Music::all();
        $viewData["composers"] = Composer::all();
        $viewData["styles"] = Style::all();
        /*
         * The Music::all() above should be replaced with an appropriate
         * MusicView::all() which has composer and arranger names and style names.
         */
        return view('admin.music.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {

        $request->validate([
            "title" => "required|max:255",
            'composer_id' => 'required|numeric',
            'arranger_id' => 'required|numeric',
            "style_id" => 'required|numeric',
            "soloist" => "max:255",
            "in_pad" => "required|boolean",
            "envelope" => "max:255",
            "notes" => "max:65536",
        ]);

        $newMusic = new Music();
        $newMusic->setTitle($request->input('title'));
        $newMusic->setComposerId($request->input('composer_id'));
        $newMusic->setArrangerId($request->input('arranger_id'));
        $newMusic->setStyleId($request->input('style_id'));
        $newMusic->setSoloist($request->input('soloist'));
        $newMusic->setInPad($request->input('in_pad'));
        $newMusic->setEnvelope($request->input('envelope'));
        $newMusic->setNotes($request->input('notes'));
        $newMusic->save();
        
        return back();
    }

    public function delete($id)
    {
        Music::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Music - Snowdown Colliery Welfare Band";
        $viewData["music"] = Music::findOrFail($id);
        $viewData["composers"] = Composer::all();
        $viewData["styles"] = Style::all();
        return view('admin.music.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {

        $composer = Composer::all();
        $style = Style::all();

        $request->validate([
            "title" => "required|max:255",
            'composer_id' => 'required|numeric',
            'arranger_id' => 'required|numeric',
            "style_id" => 'required|numeric',
            "soloist" => "max:255",
            "in_pad" => "required|boolean",
            "envelope" => "max:255",
            "notes" => "max:65536",
        ]);

        $music = Music::findOrFail($id);
        $music->setTitle($request->input('title'));
        $music->setComposerId($request->input('composer_id'));
        $music->setArrangerId($request->input('arranger_id'));
        $music->setStyleId($request->input('style_id'));
        $music->setSoloist($request->input('soloist'));
        $music->setInPad($request->input('in_pad'));
        $music->setEnvelope($request->input('envelope'));
        $music->setNotes($request->input('notes'));
        $music->setLastname($request->input('lastname'));
        $music->save();

        return redirect()->route('admin.music.index');
    }

    private function selectComposer()
    {
        $items = Composer::pluck('id', 'lastname'. ', ' . 'firstname');
    }
}
