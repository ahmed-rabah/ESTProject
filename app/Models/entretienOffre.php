<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\offre;
use App\Models\stagiaire;
class entretienOffre extends Model
{
    use HasFactory;

    protected $fillable = [
        'offre_id',
        'stagiaire_id',
        'accepter'
     ];
    public function offre(){
        return $this->belongsTo(offre::class);
    }
    public function stagiaire(){
        return $this->belongsTo(stagiaire::class);
    }
}
