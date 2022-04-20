<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\entreprise;

class feedbackEntreprise extends Model
{
    use HasFactory;

    public function entreprise(){
        return $this->belongsTo(entreprise::class);
    }
}
