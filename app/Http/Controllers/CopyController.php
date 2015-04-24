<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Library;
use Illuminate\Http\Request;

use App\Biblio;
use App\Copy;
use Illuminate\Support\Facades\Input;

class CopyController extends Controller {

    protected $rules = [
        'barcode' => 'required|min:3|unique:copies',
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Biblio $biblio)
	{
        $libraries = Library::lists('name','id');
		return view('copies/create')->with(compact('biblio','libraries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Biblio $biblio,Request $request)
	{
        $this->validate($request,$this->rules);

        $biblio->copies()->create(Input::all());

		return redirect()->route('biblios.show',[$biblio]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Biblio $biblio,Copy $copy)
	{
        $libraries = Library::lists('name','id');
        return view('copies.edit')->with(compact('biblio','copy','libraries'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Biblio $biblio,Copy $copy,Request $request)
	{
        $this->rules['barcode'] = 'required|min:3|unique:copies,barcode,'.$copy->id;

        $this->validate($request, $this->rules);

        $input = $request->all();
        $input['biblio_id'] = $biblio->id;
        $copy->update($input);

        return redirect()->route('biblios.show',[$biblio]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Biblio $biblio,Copy $copy, Request $request)
	{
        $copy->delete();
        return redirect()->route('biblios.show',[$biblio]);
	}

}
