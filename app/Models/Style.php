<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the composer primary key (id)
     * $this->attributes['style'] - string - contains the musical style
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

    public function getStyle()
    {
        return $this->attributes['style'];
    }

    public function setStyle($style)
    {
        $this->attributes['style'] = $style;
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
