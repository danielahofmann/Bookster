<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	/**
	 * Search the products table.
	 *
	 * @param  Request $request
	 * @return mixed
	 */
	public function search(Request $request)
	{
		$ageGroup = Session::get('ageGroup');

		/**
		 * If there's any data in session(results), we need to destroy it,
		 * because in a case where a user would search multiple times,
		 * he then would still see the old results
		 */
		if(Session::has('results')){
			Session::forget(['results']);
		}

		// Making sure the user entered a keyword.
		if($request->has('query')) {
			// Using the Laravel Scout syntax to search the products table.
			$results = Product::search($request->get('query'))->get();

			// If there are results return them, if none, return error
			if ($results->count() > 0){
				session(['results' => $results]);
				return redirect()
					->route($ageGroup . '-results');
			}

			return redirect()
				->route($ageGroup . '-results')
				->with('status', 'Es wurden keine passenden Produkte gefunden');

		}

		return redirect()
			->route($ageGroup . '-results')
			->with('status', 'Es wurden keine passenden Produkte gefunden');
	}
}
