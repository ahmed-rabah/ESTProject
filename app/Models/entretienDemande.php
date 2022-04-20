<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\demande;
use App\Models\entreprise;
class entretienDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'entreprise_id',
        'accepter'
     ];
    public function demande(){
        return $this->belongsTo(demande::class);
    }
    public function entreprise(){
        return $this->belongsTo(entreprise::class);
    }
}
