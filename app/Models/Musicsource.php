<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musicsource extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the composer primary key (id)
     * $this->attributes['name'] - string - contains the name of the Music Source
     * $this->attributes['sql'] - text - contains the SQL to get the music
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getSql()
    {
        return $this->attributes['sql'];
    }

    public function setSql($sql)
    {
        $this->attributes['sql'] = $sql;
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
