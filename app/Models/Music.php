<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
   
    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the composer primary key (id)
    * $this->attributes['title'] - string
    * $this->attributes['composer_id'] - bigInteger
    * $this->attributes['arranger_id'] - bigInteger
    * $this->attributes['style_id'] - bigInteger
    * $this->attributes['soloist'] - string
    * $this->attributes['in_pad'] - boolean
    * $this->attributes['envelope'] - string
    * $this->attributes['notes'] - text
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

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getComposerId()
    {
        return $this->attributes['composer_id'];
    }

    public function setComposerId($composerId)
    {
        $this->attributes['composer_id'] = $composerId;
    }

    public function getArrangerId()
    {
        return $this->attributes['arranger_id'];
    }

    public function setArrangerId($arrangerId)
    {
        $this->attributes['arranger_id'] = $arrangerId;
    }

    public function getStyleId()
    {
        return $this->attributes['style_id'];
    }

    public function setStyleId($styleId)
    {
        $this->attributes['style_id'] = $styleId;
    }

    public function getSoloist()
    {
        return $this->attributes['soloist'];
    }

    public function setSoloist($soloist)
    {
        $this->attributes['soloist'] = $soloist;
    }

    public function getInPad()
    {
        return $this->attributes['in_pad'];
    }

    public function setInPad($in_pad)
    {
        $this->attributes['in_pad'] = $in_pad;
    }

    public function getEnvelope()
    {
        return $this->attributes['envelope'];
    }

    public function setEnvelope($envelope)
    {
        $this->attributes['envelope'] = $envelope;
    }

    public function getNotes()
    {
        return $this->attributes['notes'];
    }

    public function setNotes($notes)
    {
        $this->attributes['notes'] = $notes;
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
