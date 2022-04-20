<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\offre;
use App\Models\demande;
class type extends Model
{
    use HasFactory;

    public function demande(){
        return $this->hasMany(demande::class);
    }

    public function offre(){
        return $this->hasMany(offre::class);
    }

}
