<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeSections;
use App\Models\Slideshow;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function showSlideShowData()
    {
        $slideshow = Slideshow::select('slideshow_image', 'mobile_slideshow_image', 'caption', 'body')->where('published', '1')->get();
        // foreach($slideshows as $slideshow){
        //    $slideshow['slideshow_image'] = 'https://doshcms.interactivedigital.com.gh/'.$slideshow['slideshow_image'];
        // }
        return response()->json($slideshow);
    }

    public function showHomepageSesctions(){
        $home_sections = HomeSections::get();
        $home_sections = $home_sections->map(function($section) {
            return [
                'health_insurance_image' => $section->insurance_image,
                'health_insurance_caption' => $section->insurance_caption,
                'health_insurance_body' => $section->insurance_body,
                'health_insurance_modal_body' => $section->insurance_modal_body,
                'finance_image' => $section->finance_image,
                'finance_caption' => $section->finance_caption,
                'finance_body' => $section->finance_body,
                'finance_modal_body' => $section->finance_modal_body,
                'ride_image' => $section->ride_image,
                'ride_caption' => $section->ride_caption,
                'ride_body' => $section->ride_body,
                'ride_modal_body' => $section->ride_modal_body,
                'erp_image' => $section->erp_image,
                'erp_caption' => $section->erp_caption,
                'erp_body' => $section->erp_body,
                'erp_modal_body' => $section->erp_modal_body,
                'commerce_image' => $section->commerce_image,
                'commerce_caption' => $section->commerce_caption,
                'commerce_body' => $section->commerce_body,
                'commerce_modal_body' => $section->commerce_modal_body,
                'risk_image' => $section->risk_image,
                'risk_caption' => $section->risk_caption,
                'risk_body' => $section->risk_body,
                'risk_modal_body' => $section->risk_modal_body
            ];
        });
        return response()->json($home_sections);
    }
}
