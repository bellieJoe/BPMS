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
            Application::where(['status' => $request->status, 'user_id' => auth()->user()->id])->paginate(1) : 
            Application::where(['user_id' => auth()->user()->id])->paginate(20)
        ]);
    }
    public function indexAdmin(Request $request){
        return view('main.permit.index-admin')->with([
            'permits' => $request->status ? 
            Application::where(['status' => $request->status])->paginate(20) : 
            Application::paginate(20)
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
                'butterfly_id' => 0,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'mode_of_transport' => $request->mode_of_transport,
                'date_of_transport' => $request->date_of_transport,
                'purpose' => $request->purpose,
                'details' => $request->details,
                'status' => 'pending',
                'species' => json_encode($request->species)
            ]);
        });
        return redirect(route('permits.index'));
    }
    public function destroy($id){
        Application::find($id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $permit = Application::find($id);
        return view('main.permit.edit')->with([
            'permit' => $permit,
            'butterflies' => Butterfly::all()
        ]);
    }
    public function update(Request $request, $id){
        
        $request->validate([
            'species' => 'required',
            'address' => 'required',
            'mode_of_transport' => 'required',
            'date_of_transport' => 'required',
            'purpose' => 'required',
            'details' => 'required',
        ]);

        DB::transaction(function () use($request, $id) {
            $permit = Application::find($id)->update([
                'butterfly_id' => $request->species,
                'address' => $request->address,
                'mode_of_transport' => $request->mode_of_transport,
                'date_of_transport' => $request->date_of_transport,
                'purpose' => $request->purpose,
                'details' => $request->details,
            ]);
        });
        return redirect(route('permits.index'));
    }
    public function approve($id){
        Application::find($id)->update([
            'status' => 'approved'
        ]);
        return redirect()->back();
    }
    public function decline($id){
        Application::find($id)->update([
            'status' => 'declined'
        ]);
        return redirect()->back();
    }
}
