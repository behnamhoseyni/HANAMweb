<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\user;
use App\Course;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    protected function uploadImages($file)
    {
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
        $filename = $file->getClientOriginalName();

        $file = $file->move(public_path($imagePath), $filename);

        $sizes = ['300', '600', '900'];
        // resize the image to a width of 300 and constrain aspect ratio (auto height)

        $url['image'] = $this->resize($file->getRealPath(), $filename, $sizes, $imagePath);
        $url['thumb'] = $url['image'][$sizes[0]];
        return $url;
    }

    private function resize($path, $filename, $sizes, $imagePath)
    {
        $images['original'] = $imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;

            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })
                ->save(public_path($images[$size]));

        }
        return $images;
    }

    protected function setCoursetime($episode)
    {
        $course =$episode->Course;
        $course->time=$this->getCoursetime($course->episodes->pluck('time'));
        $course->save();

    }

    protected function getCoursetime($time)
    {
        $timestamp=Carbon::parse('00:00:00');
        foreach ($time as $t) {
            $time=strlen($t) == 5 ? strtotime('00'.$t) : $t;
            $timestamp->addSecond($time);
        }
        return $timestamp('H','i','s');
    }

}
