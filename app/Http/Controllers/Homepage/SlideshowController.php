<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slideshow::all();
        return view('dashboard.pages.homepage.slideshow')
               ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sliders = Slideshow::all();
        return view('dashboard.pages.homepage.slideshow')
               ->with('sliders', $sliders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'slideshow_image' => 'required|mimes:jpg,webp,png,jpeg',
            'mobile_slideshow_image' => 'required|mimes:jpg,webp,png,jpeg',
            'caption' => 'required|max:100',
            'body' => 'required|max:200',
        ]);

        $slider_image_path = $this->uploadProfileImage($request->file('slideshow_image'));
        $mobile_slider_image_path = $this->uploadProfileImage($request->file('mobile_slideshow_image'));

        $sliders = new Slideshow();
        $sliders->slideshow_image = $slider_image_path;
        $sliders->mobile_slideshow_image = $mobile_slider_image_path;
        $sliders->caption = $request->input('caption');
        $sliders->body = $request->input('body');
        $sliders->uploaded_by = Auth::user()->name;

        $sliders->save();
        logActivity('Homepage Slideshow Created');
        return back()->with('success', 'Slideshow updated successfully');
    }


    public function uploadProfileImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/slideshow/';
        $hashed_image_name = $imageFile->hashName();
        $profile_img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $profile_img_path;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Slideshow::find($id) == null)
        {
            return back()->with('info', 'no');
        }
        $slide = Slideshow::find($id);
        $sliders = Slideshow::all();
        return view('dashboard.pages.homepage.slideshow', [
            'slide' => $slide,
            'sliders' => $sliders
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $slider = Slideshow::findOrFail($id);
        // if(!is_null($request->input('publish')))
        // {
        //     $slider->published = $request->input('publish');
        // }
        $request->validate([
            'slideshow_image' => 'nullable|mimes:jpg,webp,png,jpeg',
            'mobile_slideshow_image' => 'nullable|mimes:jpg,webp,png,jpeg',
            'caption' => 'required|max:100',
            'body' => 'required|max:200',
        ]);

        if(!is_null($request->file('slideshow_image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('slideshow_image'));
        }

        if(!is_null($request->file('mobile_slideshow_image')))
        {
            $mobileImagePath = $this->uploadProfileImage($request->file('mobile_slideshow_image'));
        }



        $slider->caption = $request->input('caption');
        $slider->body = $request->input('body');
        !isset($imagePath) ?
        '' : $slider->slideshow_image = $imagePath;
        !isset($mobileImagePath) ?
        '' : $slider->mobile_slideshow_image = $mobileImagePath;

        $slider->save();
        $sliders = Slideshow::all();
        logActivity('Homepage Slideshow Updated');
        return back()
               ->with('success', 'Slider Successfully Updated')
               ->with('sliders', $sliders);

        // return Route::view('slideshow/'.$id , [
        //     'success' => 'Slider Successfully Updated',
        //     'sliders' => $slider
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slideshow::where('id', $id)->delete();
        logActivity('Homepage Slideshow Deleted');
        return redirect()->back()->with('success', 'Slider Successfully Deleted');
    }




    // Other Functions for slideshow

    public function publish(Request $request, string $id)
    {
        $slider = Slideshow::findOrFail($id);
        $slider->published = $request->input('publish');

        $slider->save();
        $sliders = Slideshow::all();
        logActivity('Homepage Slideshow Published');
        return back()
               ->with('success', $request->input('publish') == 1 ? 'Slider Published Successfully' : 'Slider Removed Successfully')
               ->with('sliders', $sliders);


    }
}
