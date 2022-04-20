<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\entretienDemande;
use App\Models\stagiaire;
use App\Models\type;
use App\Models\domaine;

class demande extends Model
{
    use HasFactory;

    protected $guarded = ['stagiaire'];

    public function stagiaire(){
        return $this->belongsTo(stagiaire::class);
    }
    
    public function type(){
        return $this->belongsTo(type::class);
    }

    public function domaine(){
        return $this->belongsTo(domaine::class);
    }
    public function entretienDemandes(){
        return $this->hasMany(entretienDemande::class);
    }
}
