<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Butterfly;
use Illuminate\Support\Facades\Storage;


class ButterflyController extends Controller
{
    //
    public function index(){

        return view('main.butterfly.index')->with([
            'butterflies' => Butterfly::paginate(20)
        ]);
    }
    public function viewImage($url){

        return redirect(Storage::url('public/butterfly/'.$url));
    }
    public function create(){
        return view('main.butterfly.create');
    }
    public function destroy($id){
        Butterfly::find($id)->delete();
        return redirect()->back();
    }
    public function store(Request $request){
        $request->validate([
            'species' => 'required',
            'name' => 'required',
            'input_code' => 'required',
            'wing_span' => 'required',
            'is_rare' => '',
            'is_threatened' => '',
            'is_vulnerable' => '',
            'male' => 'required',
            'female' => 'required',
            'caterpillar' => 'required',
            'pupa' => 'required',
        ]);

        DB::transaction(function () use($request) {
            $butterfly = Butterfly::create([
                'species' =>  $request->species,
                'local_name' =>  $request->name,
                'input_code' =>  $request->input_code,
                'wing_span' =>  $request->wing_span,
                'is_rare' => $request->is_rare ? 1 : 0,
                'is_threatened' => $request->is_threatened ? 1 : 0,
                'is_vulnerable' => $request->is_vulnerable ? 1 : 0,
                // 'male_img_url' =>  $request->male,
                // 'female_img_url' =>  $request->female,
                // 'caterpillar_img_url' =>  $request->caterpillar,
                // 'pupa_img_url' =>  $request->pupa,
            ]);
            $image_names = [
                'pupa' => 'pupa-'.$butterfly->id.'.png',
                'male' => 'male-'.$butterfly->id.'.png',
                'female' => 'female-'.$butterfly->id.'.png',
                'caterpillar' => 'caterpillar-'.$butterfly->id.'.png',
            ];
            Storage::putFileAs('public/butterfly', $request->file('male'), $image_names['male']);
            Storage::putFileAs('public/butterfly', $request->file('female'), $image_names['female']);
            Storage::putFileAs('public/butterfly', $request->file('caterpillar'), $image_names['caterpillar']);
            Storage::putFileAs('public/butterfly', $request->file('pupa'), $image_names['pupa']);
            $butterfly->update([
                'male_img_url' =>  $image_names['male'],
                'female_img_url' =>  $image_names['female'],
                'caterpillar_img_url' =>  $image_names['caterpillar'],
                'pupa_img_url' =>  $image_names['pupa'],
            ]);
        });
        return redirect(route('butterflies.index'));
    }
}
