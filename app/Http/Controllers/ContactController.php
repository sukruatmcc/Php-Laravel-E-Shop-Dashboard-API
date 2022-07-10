<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;use Symfony\Component\HttpKernel\Event\RequestEvent;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $contacts = Contact::all();
        return view('admin.include.contact',compact('contacts'));
    }

    public function contactView($id)
    {
        $contact = Contact::find($id);
        return view('admin.include.contact_view',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'email:rfc,dns',
        ]);
       Contact::insert([
           'name' => $request->name,
           'email' => $request->email,
           'description' => $request->description,
           'created_at' => Carbon::now(),
       ]);
       return redirect()->back()->with('success','Message Sent SSuccessfully - We will contact you as soon as possible');
    }

    //front////////////////
    public function frontContact()
    {
       return view('front.include.contact');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
