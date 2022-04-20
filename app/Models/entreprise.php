<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\models\feedbackEntreprise;

class entreprise extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guard ="entreprise";
    protected $fillable = [
        'nom_entreprise',
        'ville',
        'adresse',
        'ICE',
        'telephone',
        'description',
        'logo',
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

    public function offres(){
        return $this->hasMany(offre::class);
    }
    public function feedbackEntreprises(){
        return $this->hasMany(feedbackEntreprise::class);
    }

    public function domaine(){
        return $this->belongsTo(domaine::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function entretienDemandes(){
        return $this->hasMany(entretienDemande::class);
    }

}
