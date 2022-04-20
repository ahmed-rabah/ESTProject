<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\entreprise;
use App\Models\type;
use App\Models\domaine;
use App\Models\entretienOffre;

class offre extends Model
{
    use HasFactory;

    protected $guarded = ['entreprise'];

    public function entreprise() {
        return $this->belongsTo(entreprise::class);
    }

    public function type(){
        return $this->belongsTo(type::class);
    }

    public function domaine(){
        return $this->belongsTo(domaine::class);
    }
    public function entretienOffres(){
        return $this->hasMany(entretienOffre::class);
    }
    public function candidatures(){
        return $this->hasMany(candidature::class);
    }
}
