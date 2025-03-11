<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandAPIController extends Controller
{

    public function index()
    {
        $contacts = Brand::all();
        return response()->json($contacts);
    }

    
    public function store(Request $request)
    {
        return response()->json(['message' => 'Message envoyé avec succès']);
    }


    public function show(Contact $contact)
    {
        return response()->json($contact);
    }


    public function destroy(Contact $contact)
    {
        return response()->json(['message' => 'destroy']);
    }
}
