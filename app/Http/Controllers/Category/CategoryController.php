<?php

namespace App\Http\Controllers\Category;



use App\Http\Controllers\Controller;

use App\Models\category;
use App\Models\User;
use Carbon\Doctrine\CarbonType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $category = category::latest()->paginate(5);

        $onlyCeck = category::onlyTrashed()->latest()->paginate(5);
        // $category = DB::table('categories')->latest()->paginate(5);
        // $category = DB::table('categories')
        //     ->join('users', 'categories.user_id', 'users.id')
        //     ->select('categories.*', 'users.name')->latest()->paginate(5);
        return view('admin.category.index', compact('category', 'onlyCeck'));
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


    public function store(Request $request)
    {


        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [

                'category_name.required' => 'Please Input Category Name',
                'category_name.max' => 'Category Less Than 255Chars',

            ]
        );

        category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);
        $nf = array(
            'message'=>'Category Inserted Successfull',
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


        // $catogery = category::find($id);
        $catogery = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('catogery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {



        // $catogry = category::findOrfail($request->id);


        // $catogry->category_name = $request->category_name;

        // $catogry->save();

        $data = array();
        $data['category_name'] =  $request->category_name;
        $data['user_id'] =  Auth::user()->id;
        $category = DB::table('categories')->where('id', $request->id)->update($data);

        $nf = array(
            'message'=>'Category update Successfull',
            'alert-type' => 'info'
        );
        return redirect()->route('Category')->with($nf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = category::find($id)->delete();
        $nf = array(
            'message'=>'Category Delete Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($nf);

    }

    public function Restore($id)
    {

        $category = category::withTrashed()->find($id)->restore();
        $nf = array(
            'message'=>'Category Restore Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($nf);
    }

    public function FDelete($id)
    {
        $category = category::onlyTrashed()->find($id)->forceDelete();
        $nf = array(
            'message'=>'Category forceDelete Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($nf);
    }


}
