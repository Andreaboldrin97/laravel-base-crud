<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ComicController extends Controller
{

    // VALIDATION REQUIREMENTS
    protected $validationRecord = [
        'title' => 'required|min:3|alpha_num',
        'description' => 'required|min:5|alpha',
        'imge_url' => 'required|active_url',
        'price' => 'required|numeric|integer',
        'series' => 'required|min:3|alpha_num',
        'sale_date' => 'required|after:1897-05-06',
        'type' => 'required',
    ];



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DB::table('comics')->select('type as type_name')->distinct()->get();
        return view('comic.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRecord);

        $data = $request->all();


        $newComic = new Comic();
        $newComic->create($data);
        $newComic->slug = Str::slug($newComic->title . $newComic->id, '-');
        $newComic->save();

        return redirect()->route('comics.show', $newComic->slug)->with('create', $newComic->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        $types = DB::table('comics')->select('type as type_name')->distinct()->get();
        return view('comic.create', compact(['comic', 'types']));
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
        $validatedData = $request->validate($this->validationRecord);

        $comic = Comic::findOrFail($id);
        $data = $request->all();
        $comic->update($data);
        $comic->slug = Str::slug($comic->title . $comic->id, '-');
        $comic->save();

        return redirect()->route('comics.show', $comic->slug)->with('create', $comic->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        $comic->delete();

        return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}
