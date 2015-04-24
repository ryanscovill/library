<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Biblio;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BiblioController extends Controller {

    protected $rules = [
            'title'  => 'required|unique:biblios',
            'author' => 'required'
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = Category::getNameList();
		return view('biblios/index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = Category::getNameList();
		return view('biblios/create')->with(compact('categories'));
	}

	/**
	 * Store a newly Biblio in storage.
	 *
     * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request,$this->rules);

        $categories = Category::getOrCreate($request->input('categoryList'));

        $biblio = Biblio::create($request->all());

        $biblio->categories()->attach($categories);

        return redirect()->route('biblios.show', [$biblio]);

	}

    /**
     * Show the Biblio
     *
     * @param Biblio $biblio
     * @return Response
     */
	public function show(Biblio $biblio)
	{
		return view('biblios/show')->with(compact('biblio'));
	}

	/**
	 * Show the form for editing the Biblio
	 *
	 * @param Biblio $biblio
	 * @return Response
	 */
	public function edit(Biblio $biblio)
	{

        $categories = Category::getNameList();
		return view('biblios/edit')->with(compact('biblio','categories'));
	}

	/**
	 * Update the specified Biblio in storage
	 *
	 * @param  Biblio $biblio
     * @param Request $request
	 * @return Response
	 */
	public function update(Biblio $biblio, Request $request)
	{
        $this->validate($request,[
            'title'  => 'required|unique:biblios,title,'.$biblio->id,
            'author' => 'required'
        ]);

        $categories = Category::getOrCreate($request->input('categoryList'));

        $biblio->update($request->all());

        $biblio->categories()->sync($categories);

        return redirect()->route('biblios.show',[$biblio]);

	}
	/**
	 * Remove the specified Biblio from storage.
	 *
	 * @param  Biblio $biblio
	 * @return Response
	 */
	public function destroy(Biblio $biblio)
	{

        $biblio->delete();
        return redirect()->route('biblios.index');
	}

    /**
     * Show a list of biblios from a search term
     *
     * @return Response
     */
    public function results(Request $request)
    {
        $query = Biblio::query();

        foreach(Input::all() as $key=>$term) {
            switch ($key) {
                case 'title':
                    $query->where('title', 'LIKE', '%'.$term.'%');
                    break;
                case 'author':
                    $query->where('author', 'LIKE', '%' . $term . '%');
                    break;
                case 'isbn':
                    $query->where('isbn', 'LIKE', '%' . $term . '%');
                    break;
                case 'categoryList':
                    foreach($term as $value){
                        $query->whereHas('categories', function($query) use($value) {
                            $query->where('id', $value);
                        });
                    }
                    break;
            }
        }

        if($query->get()->isEmpty()){
            return redirect()->route('biblios.index');
        }else if($query->count() == 1){
            $biblio = $query->first();
            return redirect()->route('biblios.show',[$biblio]);
        }else{
            $biblios = $query->paginate(5);
            return view('biblios.results')->with(compact('term','biblios'));
        }
    }

}
