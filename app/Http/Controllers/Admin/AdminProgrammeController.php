<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Music;
use App\Models\Concert;
use App\Models\Programme;

class AdminProgrammeController extends Controller
{
    /**
     * Available functions
     *  - index()
     *  - moveUp
     *  - moveDown
     *  - create()
     *  - edit()
     *  - deleteItem()
     *  - deleteProgramme()
     */
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Concert Programme - Snowdown Colliery Welfare Band";
        $viewData["concerts"] = Concert::all();
        $viewData["programmes"] = Programme::all();
        return view('admin.programme.index')->with("viewData", $viewData);
    }

    public function moveUp($id)
    {
        $programme_piece = Programme::findOrFail($id);
        $programme_order = $programme_piece->getOrder();
        $concert_id = $programme_piece->getConcertId();

        $first_programme_piece = Programme::where('concert_id', '=', $concert_id)
            ->orderBy('order', 'asc')
            ->first();
        $first_order = $first_programme_piece->getOrder();
        
        if( $programme_order <= $first_order )  {
            return back();
        } else {
            $programme_order_to_swap = $programme_order - 1;
            $programme_piece_to_swap = Programme::where('concert_id', '=', $concert_id)
                ->where('order', '=', $programme_order_to_swap)
                ->first();
            
            $programme_piece->setOrder($programme_order - 1);
            $programme_piece->save();

            $programme_piece_to_swap->setOrder($programme_order_to_swap + 1);
            $programme_piece_to_swap->save();
        }
        return back();
    }

    public function moveDown($id)
    {
        $programme_piece = Programme::findOrFail($id);
        $programme_order = $programme_piece->getOrder();
        $concert_id = $programme_piece->getConcertId();

        $last_programme_piece = Programme::where('concert_id', '=', $concert_id)
            ->orderBy('order', 'desc')
            ->first();

        $last_order = $last_programme_piece->getOrder();

        if ($programme_order >= $last_order) {
            return back();
        } else {
            $programme_order_to_swap = $programme_order + 1;
            $programme_piece_to_swap = Programme::where('concert_id', '=', $concert_id)
                ->where('order', '=', $programme_order_to_swap)
                ->first();
            
            $programme_piece->setOrder($programme_order + 1);
            $programme_piece->save();

            $programme_piece_to_swap->setOrder($programme_order_to_swap - 1);
            $programme_piece_to_swap->save();
        }
        return back();
    }

    public function create(Request $request) 
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Create Concert Programme - Snowdown Colliery Welfare Band";

        $request->validate([
            'add_concert_id' => 'required|numeric',
            'add_music_id' => 'required|numeric',
        ]);

        $last_programme_item_order = Programme::where('concert_id', '=', $request["add_concert_id"])
            ->orderBy('order', 'desc')
            ->first();

        if(!$last_programme_item_order) {
            $programme_order = 1;
        } else {
            $programme_order = $last_programme_item_order->getOrder() + 1;  
        }

        $newProgrammeItem = new Programme();
        $newProgrammeItem->setConcertId($request["add_concert_id"]);
        $newProgrammeItem->setMusicId($request["add_music_id"]);
        $newProgrammeItem->setOrder($programme_order);
        $newProgrammeItem->save();

        return back();
    }

    public function edit($id)
    {
        if(!isset($id)) {
            return back();
        } else {
            $viewData = [];
            $viewData["title"] = "Admin Page - Edit Concert Programme - Snowdown Colliery Welfare Band";
            $concert = Concert::findOrFail($id);
            $programme_items = Programme::join('music', 'music.id', '=', 'programmes.music_id')
                ->select('programmes.id', 'order', 'music_id', 'title')
                ->where('concert_id', '=', $id)
                ->orderBy('order', 'asc')
                ->get();
            $music = Music::select('id', 'title')
                ->orderBy('title', 'asc')
                ->get();
            $viewData["concert"] = $concert;
            $viewData["programme_items"] = $programme_items;
            $viewData['music'] = $music;
            return view('admin.programme.edit')->with("viewData", $viewData);
        }
    }

    public function deleteProgramme($id)
    {

        /** 
         * DELETES ALL pieces of music in the selected Concert Programme
         */

         $musical_items = Programme::where('concert_id', '=', $id)
            ->get();

         foreach ($musical_items as $music_item) {
            Programme::destroy($music_item->getId());
         }

         return back();
    }

    public function deleteItem($id)
    {

        /**
         * DELETES a SINGLE piece of music from a Concert Programme
         * Shuffles all Programme Items lower down (higher Order number) 
         * the programme up the programme (lowers the order number of each item by 1)
         */

        $programme_item_to_delete = Programme::findOrFail($id);
        $order_number = $programme_item_to_delete->getOrder();
        $concert_id = $programme_item_to_delete->getConcertId();

        $programme_items_to_move = Programme::select('id', 'order')
            ->where('concert_id', '=', $concert_id)
            ->where('order', '>', $order_number)
            ->get();
        
        foreach ($programme_items_to_move as $programme_item_to_move) {
            $current_order_number = $programme_item_to_move->getOrder();
            $programme_item_to_move->setOrder($current_order_number - 1);
            $programme_item_to_move->save();
        }
        
        Programme::destroy($id);
        
        return back();
    }
}
