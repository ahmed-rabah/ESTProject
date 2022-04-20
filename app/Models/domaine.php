<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domaine extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function entreprise(){
        return $this->hasMany(entreprise::class);
    }
    public function offre(){
        return $this->hasMany(offre::class);
    }
    public function demande(){
        return $this->hasMany(demande::class);
    }

}
