<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $About = HomeAbout::all();
        return view('admin.About.index', compact('About'));
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
        // $About = new HomeAbout();
        // $About ->title = $request->title;
        // $About ->short_dis = $request->short_dis;
        // $About ->long_dis = $request->long_dis;
        // $About ->save();
        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now(),
        ]);
        $nf = array(
            'message'=>'About Inserted Successfull',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $About = HomeAbout::find($id);
        return view('admin.About.edit', compact('About'));
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
        // $About =  HomeAbout::find($id);
        // $About->title = $request->title;
        // $About->short_dis = $request->short_dis;
        // $About->long_dis = $request->long_dis;
        // $About->save();
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now(),
        ]);
        $nf = array(
            'message'=>'About update Successfull',
            'alert-type' => 'info'
        );

        return redirect()->route('About')->with($nf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeAbout::destroy($id);
        $nf = array(
            'message'=>'About delete Successfull',
            'alert-type' => 'error'
        );
        return redirect()->route('About')->with($nf);
    }


}
