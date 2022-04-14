<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Superhero;

class Race extends Model
{
    public function superheros() {
        return $this->hasMany(Superhero::class);
    }
}
