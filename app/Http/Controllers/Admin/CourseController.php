<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends AdminController
{


    public function index()
    {
        {
            $Courses = Course::latest()->paginate(20);
            return view('Admin.Courses.all', compact('Courses'));
        }
    }

    public function create()
    {
        return view('Admin.Courses.create');
    }


    public function store(CourseRequest $request)
    {
        $user = auth()->user()->id;
        $imageUrl = $this->uploadImages($request->file('images'));
        Course::create(array_merge($request->all(), ['images' => $imageUrl,'user_id' => $user]));

        return redirect(route('Courses.index'));
    }
    public function show(Course $course)
    {
        //
    }

    public function edit(Course $Course)
    {
        return view('Admin.Courses.edit', compact('Course'));

    }

    public function update(CourseRequest $request, Course $Course)
    {
        $file = $request->file('images');
        $inpute = $request->all();

        if ($file) {
            $inpute['images'] = $imageUrl = $this->uploadImages($request->file('images'));
        } else {
            $inpute['images'] = $Course->images;
        }
        $inpute['images']['thumb'] = $inpute['imageThumb'];
        unset($inpute['imageThumb']);
        $Course->update($inpute);

        return redirect(route('Courses.index'));

    }


    public function destroy(Course $course)
    {
        $Course->delete();
        return redirect(route('Courses.index'));
    }
}
