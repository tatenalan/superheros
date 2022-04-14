<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Superhero;

class Publisher extends Model
{
    public function superheros() {
        return $this->hasMany(Superhero::class);
    }
}
