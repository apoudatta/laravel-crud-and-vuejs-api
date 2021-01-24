<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ApiContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json($contacts);
    }

    public function store(Request $request)
    {
        $contact = new Contact([
            'first_name' => ($request->get('first_name'))? $request->get('first_name') : '',
            'last_name' => ($request->get('last_name'))? $request->get('last_name') : '',
            'email' => ($request->get('email'))? $request->get('email') : '',
            'job_title' => ($request->get('job_title'))? $request->get('job_title') : '',
            'city' => ($request->get('city'))? $request->get('city') : '',
            'country' => ($request->get('country'))? $request->get('country') : ''
        ]);
        $contact->save();
        return response()->json($contact);
    }


    public function show($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

        return response()->json($contact);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return response()->json($contact);
    }
}
