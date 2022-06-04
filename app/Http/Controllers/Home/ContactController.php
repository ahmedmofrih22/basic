<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
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
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),


        ]);
        $nf = array(
            'message'=>'Contact Inserted Successfull',
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
       $contact= Contact::find($id);
       return view('admin.contact.edit',compact('contact'));
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
        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),


        ]);
        $nf = array(
            'message'=>'Contact Update Successfull',
            'alert-type' => 'info'
        );
        return redirect()->route('contact')->with($nf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        $nf = array(
            'message'=>'Contact Delete Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($nf);

    }

    public function contact_page(){
        $contacts = DB::table('contacts')->first();
        return view('admin.Pages.contact',compact('contacts'));

    }

    public function contact_forms( Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),


        ]);
        $nf = array(
            'message'=>'ContactForm Inserted Successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($nf);

    }

    public function message(){
        $message= ContactForm::all();
        return view('admin.contact.message',compact('message'));
    }
}
