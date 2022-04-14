<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Publisher;
use App\Race;

class Superhero extends Model
{
    protected $table = 'superheros';

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function race() {
        return $this->belongsTo(Race::class);
    }
}
