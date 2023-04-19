<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    public function getImageAttribute()
    {
        return $this->badge_icon;
    }
}
