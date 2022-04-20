<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


use App\models\feedbackStagiaire;

class stagiaire extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard ="stagiaire";

    protected $fillable = [
        'nom_stagiaire',
        'prenom_stagiaire',
        'dateNaissance',
        'CIN',
        'telephone',
        'description',
        'CV',
        'photo',
        'gendre',
        'diplome',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function demandes(){
        return $this->hasMany(demande::class);
    }

    public function experiences(){
        return $this->hasMany(experience::class);
    }

    public function schools(){
        return $this->hasMany(school::class);
    }
    public function candidatures(){
        return $this->hasMany(candidature::class);
    }
    public function feedbackStagiaires(){
        return $this->hasMany(feedbackStagiaire::class);
    }
    public function entretienOffres(){
        return $this->hasMany(entretienOffre::class);
    }
    
}
