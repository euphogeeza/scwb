<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the composer primary key (id)
     * $this->attributes['firstname'] - string - contains the firstname and initials of Composer
     * $this->attributes['lastname'] - string - contains the lastname of Composer
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

     public function getFirstname()
     {
        return $this->attributes['firstname'];
     }

     public function setFirstname($firstname)
     {
        $this->attributes['firstname'] = $firstname;
     }

     public function getLastname()
     {
        return $this->attributes['lastname'];
     }

     public function setLastname($lastname)
     {
        $this->attributes['lastname'] = $lastname;
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
     
     public function getComposer()
     {
        $first = $this->attributes['firstname'];
        $last = $this->attributes['lastname'];

        if($first=="") {
            return $last;
        } elseif ($last=="") {
            return $first;
        } else {
            return $last . ", " . $first;
        }
     }
}
