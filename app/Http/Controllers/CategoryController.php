<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $categories = Category::all();

	    return $categories;
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $category_id)
    {
	    $category = Category::find($category_id);
	    $genres = Genre::where('category_id', $category_id)->get();

	    $genre = null;

	    if(Session::has('genreId')){
	        $genre = Genre::find(Session::get('genreId'));
	    }

	    $filterCategory = function($query) use ($category_id) {
		    $query->where('category_id', $category_id);
	    };

	    $authors = Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

	    return view('age-layouts.' . Session::get('ageGroup') . '.category',
		    ['category' => $category, 'genres' => $genres, 'authors' => $authors, 'genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

	public function getGenresAndRedirect($id) {
		$category = Category::find($id);
		return redirect('/', 301);
	}
}
