<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Multipic;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    ////  mothed Slider//////

    public function SliderAil()
    {
        $Slider = Slider::all();
        return view('admin.Slider.index', compact('Slider'));
    }


    public function Slider_Store(Request $request)
    {

        $image = $request->file('Image');


        if ($image) {
            $nam_img = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_nam =  $nam_img . '.' .  $img_ext;
            $up_loction = 'image/Slider/';
            $list_img =   $up_loction . $img_nam;
           $image->move($up_loction,  $img_nam);




            Slider::insert([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $list_img,
                'created_at' => Carbon::now(),


            ]);
            $nf = array(
                'message'=>'Slider Inserted Successfull',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($nf);
        }
    }


    public function Slider_Edit($id)
    {
        $Slider = Slider::find($id);
        return view('admin.Slider.edit', compact('Slider'));
    }

    public function Slider_Update(Request $request, $id)
    {
        //
    }


    public function Slider_Destroy($id)
    {
        //
    }

    //// End mothed Slider



    ///////Portfolio////
    public function Portfolioall()
    {


        $images = Multipic::all();
        return view('admin.Pages.portfolio', compact('images'));
    }
}
