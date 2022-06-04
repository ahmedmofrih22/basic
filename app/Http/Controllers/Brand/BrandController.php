<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Models\category;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Brand = Brand::latest()->paginate(5);
        return view('admin.Brand.index', compact('Brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:255',
                'brand_image' => 'required|mimes:jpg,jpeg,png,bdf',
            ],
            [

                'brand_name.required' => 'Please Input Brand Name',
                'brand_image.min' => 'Brand longer Than 4 Characters',

            ]


        );

        // $data = new Brand();

        // if ($request->file('brand_image')) {
        //     $file = $request->file('brand_image');
        //     $file_name =  $file->getClientOriginalName();
        //     $file_name = date('YmdHi') . $file_name;
        //     $file->move(public_path('public/brand'), $file_name);
        //     $data['brand_image'] = $file_name;
        // }


        // $data['brand_name'] = $request->brand_name;
        // $data['created_at'] = Carbon::now();

        // $data->save();



        //// حل اخر

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name =  $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img =  $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' =>  $last_img,
            'created_at' => Carbon::now(),


        ]);

        $nf = array(
            'message'=>'Brand Inserted Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $nf);
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
        $brands = Brand::find($id);
        return view('admin.Brand.edit', compact('brands'));
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

        $validated = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],
            [

                'brand_name.required' => 'Please Input Brand Name',
                'brand_image.min' => 'Brand longer Than 4 Characters',

            ]


        );





        //// حل اخر
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name =  $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img =  $up_location . $img_name;
            $brand_image->move($up_location, $img_name);
            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' =>  $last_img,
                'created_at' => Carbon::now(),


            ]);
            $nf = array(
                'message'=>'Brand Inserted Successfull',
                'alert-type' => 'info'
            );
            return redirect()->route('Brand')->with($nf);
        } else {

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,

                'created_at' => Carbon::now(),


            ]);
            $nf = array(
                'message'=>'Brand Inserted Successfull',
                'alert-type' => 'warning'
            );
            return redirect()->route('Brand')->with($nf);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        $nf = array(
            'message'=>'Brand Inserted Successfull',
            'alert-type' => 'error'
        );
        return redirect()->route('Brand')->with($nf);
    }
}
