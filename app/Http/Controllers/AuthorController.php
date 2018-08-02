<?php

namespace App\Http\Controllers;

use App\Author;
use App\AuthorImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $user = Auth::guard('admin')->user();

	    $authors = \App\Author::with( 'author_image' )
	                          ->orderBy( 'created_at', 'DESC' )
	                          ->get();
	    return view('admin.pages.authors', ['user' => $user, 'authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $user = Auth::guard('admin')->user();

	    return view('admin.pages.authors.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $author = new Author();

	    $this->validate( $request, [
		    'firstname' => 'required',
		    'lastname'  => 'required',
		    'image'     => 'required|image|file',
	    ], [
		    'image.file'     => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'image.required' => 'Bitte wählen Sie ein Bild des Autors aus.',
	    ] );

	    $author->firstname = $request->input( 'firstname' );
	    $author->lastname  = $request->input( 'lastname' );
	    $author->save();

	    $author_image      = new AuthorImage();
	    $author_image->img = $request->image->getClientOriginalName();
	    $author_image->author_id = $author->id;
	    $author_image->save();

	    $request->image->storeAs( 'author-image', $request->image->getClientOriginalName() );

	    return redirect()
		    ->route( 'admin.authors' )
		    ->with( 'status', 'Autor wurde erfolgreich erstellt!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author, $id)
    {
	    $user = Auth::guard('admin')->user();

	    $author = \App\Author::find($id);

	    return view('admin.pages.authors.edit', ['user' => $user, 'author' => $author]);
    }


	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  \App\Author  $author
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Author $author, $id)
	{
		$user = Auth::guard('admin')->user();

		$author = \App\Author::find($id);

		return view('admin.pages.author-delete', ['user' => $user, 'author' => $author]);
	}

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author, $id)
    {
	    $author = Author::find($id);

	    $this->validate( $request, [
		    'firstname' => 'required',
		    'lastname'  => 'required',
		    'image'     => 'image|file',
	    ], [
		    'image.file' => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
	    ] );

	    $author->firstname = $request->input('firstname');
	    $author->lastname = $request->input('lastname');
	    $author->save();

	    if($request->has('image')){
		    $author_image = AuthorImage::where('author_id', $id)->first();

		    //First delete the old image in storage so we can prevent garbage
		    Storage::delete('author-image/' . $author->author_image->img);

		    $author_image->img = $request->image->getClientOriginalName();
		    $author_image->save();

		    $request->image->storeAs('author-image', $request->image->getClientOriginalName());
	    }

	    return redirect()
		    ->route('admin.authors')
		    ->with('status', 'Autor wurde erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, $id)
    {
	    $author = Author::find($id);

	    Storage::delete('author-image/' . $author->author_image->img);

	    $author->author_image()->delete();
		$author->products()->delete();

	    /**
	     * Delete from authors_categories pivot
	     */
	    DB::delete('delete from authors_categories where author_id = ?', array($author->id));

	    $author->delete();

	    return redirect()
		    ->route('admin.authors')
		    ->with('status', 'Autor wurde erfolgreich gelöscht!');
    }

    /**
     * Display a listing of six random authors
     *
     * @return \Illuminate\Http\Response
     */

	public function getAuthors() {
		$authors = Author::inRandomOrder()
		                 ->take( 6 )
		                 ->with( 'author_image' )
		                 ->get();
		return $authors;
	}
}
