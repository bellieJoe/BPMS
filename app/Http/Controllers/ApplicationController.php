<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Butterfly;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    //
    public function index(Request $request){
        return view('main.permit.index')->with([
            'permits' => $request->status ? 
            Application::where(['status' => $request->status, 'user_id' => auth()->user()->id])->get() : 
            Application::where(['user_id' => auth()->user()->id])->get()
        ]);
    }
    public function create(){
        return view('main.permit.create')->with([
            'butterflies' => Butterfly::all()
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'species' => 'required',
            'address' => 'required',
            'mode_of_transport' => 'required',
            'date_of_transport' => 'required',
            'purpose' => 'required',
            'details' => 'required',
        ]);

        DB::transaction(function () use($request) {
            Application::create([
                'butterfly_id' => $request->species,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'mode_of_transport' => $request->mode_of_transport,
                'date_of_transport' => $request->date_of_transport,
                'purpose' => $request->purpose,
                'details' => $request->details,
                'status' => 'pending'
            ]);
        });
        return redirect(route('permits.index'));
    }
}
