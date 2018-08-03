<?php

namespace App\Http\Controllers;

use App\Author;
use App\Character;
use App\Image;
use App\Product;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $user = Auth::guard('admin')->user();

	    $products = \App\Product::with( 'author' )
	                            ->with( 'category' )
	                            ->with( 'genre' )
	                            ->with( 'image' )
	                            ->orderBy( 'created_at', 'DESC' )
	                            ->get();

	    return view('admin.pages.products', ['user' => $user, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $user = Auth::guard('admin')->user();

	    $categories = \App\Category::all();
	    $genres = \App\Genre::all();
	    $authors = \App\Author::all();
	    $characters = \App\Character::all();

	    return view('admin.pages.products.create', ['user' => $user, 'genres' => $genres,
	                                                'categories' => $categories, 'authors' => $authors, 'characters' => $characters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $product = new Product();

	    $this->validate( $request, [
		    'name'        => 'required',
		    'price'       => 'required',
		    'description' => 'required',
		    'amount'      => 'required|integer',
		    'bestseller'  => 'required|integer',
		    'category'    => 'required|integer',
		    'release'    => 'required|date',
		    'genre'       => 'required|integer',
		    'author'      => 'required|integer',
		    'character'   => 'integer',
		    'image'       => 'required|image|file',

	    ], [
		    'image.file'       => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'release.date'     => 'Bitte geben Sie ein korrektes Datum an.',
		    'release.required' => 'Bitte geben Sie ein korrektes Datum an.',
	    ] );

	    $product->name = $request->input('name');
	    $product->price = $request->input('price');
	    $product->description = $request->input('description');
	    $product->amount = $request->input('amount');
	    $product->bestseller = $request->input('bestseller');
	    $product->release = $request->input('release');
	    $product->category_id = $request->input('category');
	    $product->genre_id = $request->input('genre');
	    $product->author_id = $request->input('author');
	    $product->character_id = $request->input('character');
	    $product->user_id = Auth::guard('admin')->user()->id;
	    $product->save();

	    $author = Author::find($request->input('author'));
	    $author->categories()->attach($request->input('category'));

	    $image = new Image();
	    $image->img = $request->image->getClientOriginalName();
	    $image->product_id = $product->id;
	    $image->save();

	    $request->image->storeAs('product-image', $request->image->getClientOriginalName());

	    return redirect()
		    ->route('admin.products')
		    ->with('status', 'Produkt erfolgreich erstellt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
	    $product = Product::where('id', $id)
	                      ->with('image')
	                      ->with('author')
	                      ->with('category')
	                      ->with('genre')
	                      ->where('ebook', 0)
	                      ->get();

	    return view('age-layouts.' . Session::get('ageGroup') . '.product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
	    $user = Auth::guard('admin')->user();

	    $product = \App\Product::where('id', $id)
	                           ->with('author')
	                           ->with('image')
	                           ->with('genre')
	                           ->with('category')
	                           ->with('character')
	                           ->first();

	    $categories = \App\Category::all();
	    $genres = \App\Genre::all();
	    $authors = \App\Author::all();
	    $characters = \App\Character::all();

	    return view('admin.pages.products.edit', ['user' => $user, 'product' => $product, 'genres' => $genres,
	                                              'categories' => $categories, 'authors' => $authors, 'characters' => $characters]);
    }

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Product $product, $id)
	{
		$user = Auth::guard('admin')->user();

		$product = \App\Product::find($id);

		return view('admin.pages.product-delete', ['user' => $user, 'product' => $product]);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);

	    $this->validate( $request, [
		    'name'        => 'required',
		    'price'       => 'required',
		    'description' => 'required',
		    'amount'      => 'required|integer',
		    'bestseller'  => 'required|integer',
		    'release'     => 'required|date',
		    'category'    => 'required|integer',
		    'genre'       => 'required|integer',
		    'author'      => 'required|integer',
		    'character'   => 'integer',
		    'image'       => 'image|file',

	    ], [
		    'image.file'       => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'image.image'       => 'Etwas ist schiefgelaufen, bitte beachten Sie das es sich um eine Datei in folgenden Format handelt: jpeg, png, svg.',
		    'release.date'     => 'Bitte geben Sie ein korrektes Datum an.',
		    'release.required' => 'Bitte geben Sie ein korrektes Datum an.',
	    ] );

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->bestseller = $request->input('bestseller');
	    $product->release = $request->input('release');
	    $product->category_id = $request->input('category');
	    $product->genre_id = $request->input('genre');
	    $product->author_id = $request->input('author');
	    $product->character_id = $request->input('character');
		$product->user_id = Auth::guard('admin')->user()->id;
	    $product->save();

	    $author = Author::find($request->input('author'));
	    $author->categories()->attach($request->input('category'));

	    if($request->has('image')) {
		    $image      = Image::where( 'product_id', $id )->first();

		    //First delete old image from storage
		    Storage::delete('product-image/' . $product->image[0]->img);

		    $image->img = $request->image->getClientOriginalName();
		    $image->save();

		    $request->image->storeAs( 'product-image', $request->image->getClientOriginalName() );
	    }

	    return redirect()
		    ->route('admin.products')
		    ->with('status', 'Produkt erfolgreich bearbeitet!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
	    $product = Product::find($id);

	    /**
	     * First of all detaching order from products, then also deleting image
	     */
	    DB::delete('delete from order_product where product_id = ?', array($product->id));

	    Storage::delete('product-image/' . $product->image[0]->img);

	    $product->image()->delete();

	    $product->delete();

	    return redirect()
		    ->route('admin.products')
		    ->with('status', 'Produkt erfolgreich gelöscht!');
    }

	/**
	 * Display a listing of the newest bestseller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getNewBestsellers() {
		$bestsellers = Product::where('bestseller', 1)
		                      ->orderBy('created_at', 'desc')
		                      ->take(12)
			                  ->with('image')
			                  ->with('author')
			                  ->where('ebook', 0)
			                  ->where('amount', '>', 0)
		                      ->get();
		return $bestsellers;
    }

    /**
	 * Display a listing of the newest bestseller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getNewBestsellersForKids() {
		$bestsellers = Product::where('bestseller', 1)
		                      ->orderBy('created_at', 'desc')
		                      ->take(12)
		                      ->where('category_id', 3)
			                  ->with('image')
			                  ->with('author')
			                  ->where('ebook', 0)
			                  ->where( 'amount', '>', 0 )
			                  ->get();
		return $bestsellers;
    }

	/**
	 * Display a listing of the novelties
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function getNovelties(  ) {
	    $novelties = Product::where('ebook', 0)
	                          ->orderBy('created_at', 'desc')
	                          ->take(6)
	                          ->with('image')
	                          ->with('author')
	                          ->where( 'amount', '>', 0 )
	                          ->get();
	    return $novelties;
    }

	/**
	 * Display a listing of the novelties for kids
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getKidsNovelties(  ) {
		$novelties = Product::where('ebook', 0)
		                    ->orderBy('created_at', 'desc')
							->where('category_id', 3)
		                    ->with('image')
							->where( 'amount', '>', 0 )
							->get();
		return $novelties;
	}

	/**
	 * Get products of genre
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getProductsOfGenre($id) {
		$products_of_genre = Product::where('genre_id', $id)
		                    ->orderBy('created_at', 'desc')
		                    ->with('image')
		                    ->where( 'amount', '>', 0 )
		                    ->get();
		return $products_of_genre;
	}

	/**
	 * Get products of author
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getProductsOfAuthor($id) {
		$products_of_author = Product::where('author_id', $id)
		                            ->orderBy('created_at', 'desc')
		                            ->with('image')
		                            ->where( 'amount', '>', 0 )
		                            ->get();
		return $products_of_author;
	}

	/**
	 * Get products of author
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function filterProducts(Request $request) {
		$genre_id = $request->genreId;
		$author_id = $request->authorId;

		$filtered_products = Product::where('author_id', $author_id)
		                             ->where('genre_id', $genre_id)
		                             ->orderBy('created_at', 'desc')
		                             ->with('image')
									 ->where( 'amount', '>', 0 )
									 ->get();
		return $filtered_products;
	}

	public function getProductsOfCategory($id) {

		if (Session::has('genreId')){
			$products = Product::where( 'genre_id', Session::get( 'genreId' ) )
			                   ->orderBy( 'created_at', 'desc' )
			                   ->with( 'image' )
			                   ->where( 'amount', '>', 0 )
			                   ->get();

			Session::forget(['genreId']);

		}else{
			$products = Product::where( 'category_id', $id )
			                   ->orderBy( 'created_at', 'desc' )
			                   ->with( 'image' )
			                   ->get();
		}

		return $products;
	}

	public function getBooksOfAuthor($author_id) {
		$author = Author::find($author_id);

		$products = Product::where('author_id', $author_id)
		                            ->orderBy('created_at', 'desc')
		                            ->with('image')
		                            ->where( 'amount', '>', 0 )
		                            ->get();

		return view('age-layouts.' . Session::get('ageGroup') . '.author', ['author' => $author, 'products' => $products]);
	}
}
