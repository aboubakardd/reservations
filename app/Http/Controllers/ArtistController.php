<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artists = Artist::all();
        return view('artist.index',[
            'artists' => $artists,
            'resource' => 'artistes',
        ]);

    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        //Validation
        if(Auth::user()==null || Auth::user()->role!='admin') {
            return redirect()->route('login');
        }
        
        //Traitement
        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

        //Le formulaire a été validé, nous créons un nouvel artiste à insérer
        $artist = new Artist();

        //Assignation des données et sauvegarde dans la base de données
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

        $artist->save();

        return redirect()->route('artist.index');

    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $artist = Artist::find($id);
        return view('artist.show',[
            'artist' => $artist,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        $artist = Artist::find($id);
        return view('artist.edit',[
            'artist' => $artist,
        ]);

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

        //Le formulaire a été validé, nous récupérons l’artiste à modifier
        $artist = Artist::find($id);

	//    //Mise à jour des données modifiées et sauvegarde dans la base de données
    //    $artist->update($validated);
        
        //Mise à jour des données modifiées et sauvegarde dans la base de données
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

	   $artist->save();


        return view('artist.show',[
            'artist' => $artist,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        //
        // $artist = Artist::find($id);

        // if($artist) {
        //     $artist->delete();
        // }

        // return redirect()->route('artist.index');
        
        Artist::destroy($id);

        return redirect()->route('artist.index');

    }
}
