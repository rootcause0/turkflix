<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Item;
use App\Services\Models\Show;
use App\Services\Storage;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $item = Show::all();
        return view('admin.series.index',['items'=>$item]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.series.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $poster = $request->file('poster')->store('local');
        $backPoster = $request->file('back_poster')->store('subpage');
        //Dirty Code because of merge problem.
        $show = new Show();
        $show->imdb_id = $request->imdb_id;
        $show->show_title = $request->show_title;
        $show->original_title = $request->original_title;
        $show->slug = $request->slug;
        $show->poster = "/poster/".$poster;
        $show->back_poster = "/poster/".$backPoster;
        $show->youtube_key = $request->youtube_key;
        $show->release = $request->release;
        $show->save();
        return redirect()->route("series.index",compact('items'));
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
}
