<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Traitez les données et enregistrez la réservation
        // ...

        // Redirigez ou retournez une réponse
        return redirect()->route('show.index')->with('success', 'Réservation effectuée avec succès!');
    }
}
