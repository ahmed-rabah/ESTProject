<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stagiaire;
use App\models\offre;

class candidature extends Model
{
    use HasFactory;

    protected $fillable = [
       'offre_id',
       'stagiaire_id',
    ];
    public function stagiaire(){
        return $this->belongsTo(stagiaire::class);
    }
    public function offre(){
        return $this->belongsTo(offre::class);
    }
}
