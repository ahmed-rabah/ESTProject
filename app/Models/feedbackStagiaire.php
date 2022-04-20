<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\stagiaire;
class feedbackStagiaire extends Model
{
    use HasFactory;

    public function stagiaire(){
        return $this->belongsTo(stagiaire::class);
    }
}
