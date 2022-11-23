<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the programmes primary key (id)
    * $this->attributes['concert_id'] - int - contains the id of the Concert
    * $this->attributes['music_id'] - int - contains the id of the piece of music.
    * $this->attributes['order'] - int - contains the index orderinal for the piece of music within the Concert Programme
    * $this->attributes['created_at'] - timestamp - contains the date time that the record was created
    * $this->attributes['updated_at'] - timestamp - contains the date time that the record was updated
    */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getConcertId()
    {
        return $this->attributes['concert_id'];
    }

    public function setConcertId($concert_id)
    {
        $this->attributes['concert_id'] = $concert_id;
    }

    public function getMusicId()
    {
        return $this->attributes['music_id'];
    }

    public function setMusicId($music_id)
    {
        $this->attributes['music_id'] = $music_id;
    }

    public function getOrder()
    {
        return $this->attributes['order'];
    }

    public function setOrder($order)
    {
        $this->attributes['order'] = $order;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function getProgramme()
    {
        $programme = Programmes::where('concert_id', '=', $this->attribute['concert_id']);

        $concert_programe = [];

        foreach ($programme->getMusicId() as $piece)
        {
            $concert_piece = [];

            $piece = Music::findOrFail($piece->getId());
            $concert_piece["title"] = $piece->getTitle();
            $concert_piece["soloist"] = $piece->getSoloist();
            $concert_piece["in_pad"] = $piece->getInPad();
    
            $composer = Composer::findOrFail($piece->getComposerId());
            $concert_piece["composer"] = $composer->getComposer();

            $composer = Composer::findOrFail($piece->getArrangerId());
            $concert_piece["arranger"] = $composer->getComposer();
    
            $style = Style::findOrFail($piece->getStyleId());
            $concert_piece["style"] = $style->getStyle();

            array_push($concert_piece, $concert_programe);
        }
        return $concert_programe;
    }
}
