<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\models\school;
use App\models\experience;
use App\models\stagiaire;
use App\models\offre;
use App\models\entreprise;
use App\models\demande;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-school', function (stagiaire $user, school $school) {
            return $user->id === $school->stagiaire_id;
        });

        Gate::define('delete-experience', function (stagiaire $user, experience $experience) {
            return $user->id === $experience->stagiaire_id;
        });
        Gate::define('delete-demande', function (stagiaire $user, demande $demande) {
            return $user->id === $demande->stagiaire_id;
        });
        Gate::define('delete-offre', function (entreprise $user, offre $offre) {
            return $user->id === $offre->entreprise_id;
        });
        Gate::define('update-school', function (stagiaire $user, school $school) {
            return $user->id === $school->stagiaire_id;
        });

        Gate::define('update-experience', function (stagiaire $user, experience $experience) {
            return $user->id === $experience->user_id;
        });

        Gate::define('update-demande', function (stagiaire $user, demande $demande) {
            return $user->id === $demande->stagiaire_id;
        });
        Gate::define('update-offre', function (entreprise $user, offre $offre) {
            return $user->id === $offre->entreprise_id;
        });
    }
}
