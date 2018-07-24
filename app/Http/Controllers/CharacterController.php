<?php

namespace App\Http\Controllers;

use App\Character;
use App\CharacterImage;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $character = new Character();

	    $this->validate( $request, [
		    'name'    => 'required',
		    'toddler' => 'required',
		    'image'   => 'required|image|file',
	    ], [
		    'image.file'       => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'image.image'      => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'image.required'   => 'Bitte wählen Sie ein Bild des Autors aus.',
		    'toddler.required' => 'Bitte wählen Sie eine Option aus.',
	    ] );

	    $character->name = $request->input( 'name' );
	    $character->toddler = $request->input( 'toddler' );
	    $character->save();

	    $character_image = new CharacterImage();
	    $character_image->img = $request->image->getClientOriginalName();
	    $character_image->character_id = $character->id;
	    $character_image->save();

	    $request->image->storeAs( 'character-image', $request->image->getClientOriginalName() );

	    return redirect()
		    ->route( 'admin.characters' )
		    ->with( 'status', 'Charakter wurde erfolgreich erstellt!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $character = Character::find($id);

	    $this->validate( $request, [
		    'name' => 'required',
		    'toddler' => 'required',
		    'image'     => 'image|file',
	    ], [
		    'image.file' => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'image.image' => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'toddler.required' => 'Bitte wählen Sie eine Option aus.',
	    ] );

	    $character->name = $request->input('name');
	    $character->toddler  = $request->input( 'toddler' );
	    $character->save();

	    if($request->has('image')){
		    $character_image = CharacterImage::where('character_id', $id)->first();
		    $character_image->img = $request->image->getClientOriginalName();
		    $character_image->save();

		    $request->image->storeAs('character-image', $request->image->getClientOriginalName());
	    }

	    return redirect()
		    ->route('admin.characters')
		    ->with('status', 'Charakter wurde erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $character = Character::find($id);

	    $character->character_image()->delete();

	    $character->delete();

	    return redirect()
		    ->route('admin.characters')
		    ->with('status', 'Charakter wurde erfolgreich gelöscht!');
    }

	public function getCharactersForKids() {
		$characters = Character::inRandomOrder()
						 ->where('toddler', 1)
		                 ->take(9)
		                 ->with( 'character_image' )
		                 ->get();
		return $characters;
    }
}
