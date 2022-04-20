<?php

namespace App\View\Components;

use Illuminate\View\Component;

class checkCandidat extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function check_candidate(candidature $candidature)
    {   
        $x = entretien::where([
            ['offre_id', '=', $candidature->offre_id],
            ['stagiaire_id', '=', $candidature->stagiaire_id],
           
        ])->exists();
        dd($x);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard.entreprise.offre.display');
    }
}
