<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
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
        //
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
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
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
