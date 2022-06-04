<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = User::all();
        // $user = DB::table('users')->get();
        return view('admin.User.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'ahmed';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->file('Image');
        if ( $image) {
                $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name =  $name_gen . '.' . $img_ext;
            $up_location = 'image/User/';
            $last_img =  $up_location . $img_name;
            $image->move($up_location, $img_name);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' =>  $last_img,

                'created_at' => Carbon::now(),


            ]);
            $nf = array(
                'message'=>'User Inserted Successfull',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($nf);
        }else{

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' =>  'image/User/avatar5.png',

                'created_at' => Carbon::now(),


            ]);
            $nf = array(
                'message'=>'User Inserted Successfull',
                'alert-type' => 'warning'
            );
            return redirect()->route('User')->with($nf);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       return 'ajkkl';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.User.edit', compact('user'));
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
        $old_image = $request->old_image;
        $image = $request->file('Image');
        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ex = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ex;
            $up_location = 'image/User/';
            $last_img =  $up_location .   $img_name;
            $image->move($up_location, $img_name);
            unlink($old_image);
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' =>  $last_img,

                'created_at' => Carbon::now(),

            ]);
            $nf = array(
                'message'=>'User Inserted Successfull',
                'alert-type' => 'info'
            );
            return redirect()->route('User')->with($nf);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,


                'created_at' => Carbon::now(),

            ]);
            $nf = array(
                'message'=>'User Update Successfull',
                'alert-type' => 'warning'
            );
            return redirect()->route('User')->with($nf);
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

        $Image =  User::find($id);

        $old_image = $Image->image;
        unlink($old_image);
        User::find($id)->delete();
        $nf = array(
            'message'=>'User Delete Successfull',
            'alert-type' => 'error'
        );

        return redirect()->route('User')->with($nf);
    }

    public function profile(Request $request)
    {

        $id = $request->id;
        $user = User::where('id', $id)->first();
        return view('profile.show', compact('user'));
    }
}
