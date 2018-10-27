<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PanelController extends Controller
{
    protected function index()
    {
        return view('Admin.master');
    }
    public function UploadImageSubject(Request $request)
    {

        $this->validate(request(), [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        if (file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath),  $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";


    }

}
