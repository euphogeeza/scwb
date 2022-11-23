<?php

namespace App\Http\Controllers\Admin;

use App\Models\Concert;
use App\Models\Programme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use Carbon\Carbon;

class AdminConcertController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Concerts - Snowdown Colliery Welfare Band";
        $viewData["concerts2"] = Concert::select('id', 'concert_date_time', 'venue', 'subtitle')
            ->selectRaw('year(concert_date_time) as year')
            ->selectRaw('month(concert_date_time) as month')
            ->orderBy('concert_date_time', 'desc')
            ->simplePaginate(50);

        $viewData["concerts"] = Concert::leftJoin('programmes', 'concerts.id', '=', 'programmes.concert_id')
            ->select('concerts.id', 'concerts.venue', 'concerts.subtitle', 'concerts.concert_date_time')
            ->selectRaw('IF(count(music_id)>0,TRUE,FALSE) as has_programme')
            ->selectRaw('year(concert_date_time) as year')
            ->selectRaw('month(concert_date_time) as month')
            ->groupBy('concerts.id', 'concerts.venue', 'concerts.subtitle', 'concerts.concert_date_time')
            ->orderBy('concert_date_time', 'desc')
            ->simplePaginate(50);
            // ->get()
            // ->orderBy('concert_date_time', 'desc');

            return view('admin.concert.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "concert_date_time" => "required|date|max:255",
            "venue" => "required|max:255",
            "subtitle" => "max:255",
            "display" => "required|boolean",
            "display_programme" => "required|boolean",
        ]);

        $newConcert = new Concert();
        $newConcert->setConcertDateTime($request->input('concert_date_time'));
        $newConcert->setVenue($request->input('venue'));
        $newConcert->setSubtitle($request->input('subtitle'));
        $newConcert->setDisplay($request->input('display'));
        $newConcert->setDisplayProgramme($request->input('display_programme'));
        $newConcert->save();
        
        return back();
    }

    public function delete($id)
    {
        Concert::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Concert - Snowdown Colliery Welfare Band";
        $viewData["concert"] = Concert::findOrFail($id);
        return view('admin.concert.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "concert_date_time" => "required|date|max:255",
            "venue" => "required|max:255",
            "subtitle" => "max:255",
            "display" => "required|boolean",
            "display_programme" => "required|boolean",
        ]);

        $concert = Concert::findOrFail($id);
        $concert->setConcertDateTime($request->input('concert_date_time'));
        $concert->setVenue($request->input('venue'));
        $concert->setSubtitle($request->input('subtitle'));
        $concert->setDisplay($request->input('display'));
        $concert->setDisplayProgramme($request->input('display_programme'));
        $concert->save();

        return redirect()->route('admin.concert.index');
    }

}
