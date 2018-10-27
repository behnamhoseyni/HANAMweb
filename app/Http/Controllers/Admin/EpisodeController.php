<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\EpisodeRequest;
use App\Http\Controllers\Controller;
use App\Episode;

class EpisodeController extends AdminController
{
    public function index()
    {
        $epsodes=Episode::latest()->paginate(20);
        return view('Admin.Episodes.all',compact('episodes'));

    }

    public function create()
    {
        return view('Admin.Episods.create');
    }

    public function store(EpisodeRequest $request)
    {
        $episode=Episode::created($request->all());
        $this->setCoursetime($episode);
    }

    public function show(Episode $episode)
    {
        //
    }

    public function edit(Episode $episode)
    {
        return view('Admin.Episodes.edit', compact('Course'));
    }

    public function update(EpisodeRequest $request, Episode $episode)
    {

    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return redirect(route('episode.index'));

    }
}
