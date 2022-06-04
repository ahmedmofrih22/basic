<?php

namespace  App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class MultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $image = Multipic::all();
        return view('admin.Multipic.index', compact('image'));
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
        $Image = $request->file('Image');
        foreach ($Image as $Images) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($Images->getClientOriginalExtension());
            $img_name =  $name_gen . '.' . $img_ext;
            $up_location = 'image/ Multi/';
            $last_img =  $up_location . $img_name;
            $Images->move($up_location, $img_name);

            Multipic::insert([

                'Image' =>  $last_img,
                'created_at' => Carbon::now(),


            ]);
        } // end foreach

        $nf = array(
            'message'=>'Brand Inserted Successfull',
            'alert-type' => 'success'
        );
  
        return redirect()->back()->with($nf);
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
