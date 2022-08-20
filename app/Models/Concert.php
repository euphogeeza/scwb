<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
   
    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the composer primary key (id)
    * $this->attributes['concert_date_time'] - timestamp - contains the Date / Time of the Concert
    * $this->attributes['venue'] - string - contains the name of the Venue
    * $this->attributes['subtitle'] - string - contains the name of the Concert
    * $this->attributes['display'] - integer - holds 1 = YES Display the Concert / 0 = NO Hide the Concert
    * $this->attributes['display_programme'] - integer - holds
    *                     1 = YES Display the Concert Programme
    *                     0 = NO Hide the Concert Programme
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

    public function getConcertDateTime()
    {
        return $this->attributes['concert_date_time'];
    }

    public function setConcertDateTime($concertDateTime)
    {
        $this->attributes['concert_date_time'] = $concertDateTime;
    }

    public function getConcertDate()
    {
        $dateparts = explode(" ", $this->attributes['concert_date_time']);
        $date = $dateparts[0];
        $reformatted_date = date('d M Y', strtotime($date));
        return $reformatted_date;
    }

    public function getConcertYear()
    {
        $dateparts = explode(" ", $this->attributes['concert_date_time']);
        $date = $dateparts[0];
        $year = date('Y', strtotime($date));
        return $year;
    }

    public function getConcertMonth()
    {
        $dateparts = explode(" ", $this->attributes['concert_date_time']);
        $date = $dateparts[0];
        $month = date('M', strtotime($date));
        return $month;
    }

    public function getConcertTime()
    {
        $dateparts = explode(" ", $this->attributes['concert_date_time']);
        $time = $dateparts[1];
        $reformatted_time = date('G:i', strtotime($time));
        return $reformatted_time;
    }

    public function getVenue()
    {
        return $this->attributes['venue'];
    }

    public function setVenue($venue)
    {
        $this->attributes['venue'] = $venue;
    }

    public function getSubTitle()
    {
        return $this->attributes['subtitle'];
    }

    public function setSubTitle($subtitle)
    {
        $this->attributes['subtitle'] = $subtitle;
    }

    public function getDisplay()
    {
        return $this->attributes['display'];
    }

    public function setDisplay($display)
    {
        $this->attributes['display'] = $display;
    }

    public function getDisplayProgramme()
    {
        return $this->attributes['display_programme'];
    }

    public function setDisplayProgramme($displayProgramme)
    {
        $this->attributes['display_programme'] = $displayProgramme;
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
        return $this->attributes['updated_at_at'];
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }
}
