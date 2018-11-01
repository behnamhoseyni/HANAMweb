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
        $episodes=Episode::latest()->paginate(20);
        return view('Admin.episodes.all',compact('episodes'));

    }

    public function create()
    {
        return view('Admin.episodes.create');
    }

    public function store(EpisodeRequest $request)
    {

        $episode=Episode::create($request->all());
        $this->setCoursetime($episode);
        return redirect(route('episodes.index'));
    }

    public function show(Episode $episode)
    {
        //
    }

    public function edit(Episode $episode)
    {
        return view('Admin.episodes.edit', compact('episode'));
    }

    public function update(EpisodeRequest $request, Episode $episode)
    {
        $episode->update($request->all());
        $this->setCourseTime($episode);

        return redirect(route('episodes.index'));
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return redirect(route('episodes.index'));

    }
}
