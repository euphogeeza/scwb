<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class viewConcertProgramme extends Model
{
    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['concert_id'] - int - id number of the concert
    * $this->attributes['title'] - string - containes the title of the piece of music
    * $this->attributes['comp_arr_str'] - string - contains the concatenated string of Composer and/or Arranger
    * $this->attributes['composer'] - string
    * $this->attributes['arranger'] - string
    * $this->attributes['order'] - integer  * $this->attributes['style'] - string
    * $this->attributes['soloist'] - string
    */

    public function getConcertId()
    {
        return $this->attributes['concert_id'];
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function getComposerArranger()
    {
        return $this->attributes['comp_arr_str'];
    }

    public function getComposer()
    {
        return $this->attributes['composer'];
    }

    public function getArranger()
    {
        return $this->attributes['arranger'];
    }

    public function getOrder()
    {
        return $this->attributes['order'];
    }

    public function getSoloist()
    {
        return $this->attributes['soloist'];
    }
}
