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
    public function edit($id){
        return view('main.butterfly.edit')->with([
            'butterfly' => Butterfly::find($id)
        ]);
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
    public function update(Request $request, $id){
        $request->validate([
            'species' => 'required',
            'name' => 'required',
            'input_code' => 'required',
            'wing_span' => 'required',
            'is_rare' => '',
            'is_threatened' => '',
            'is_vulnerable' => '',
        ]);

        DB::transaction(function () use($request, $id) {
            $butterfly = Butterfly::find($id);
            $butterfly->update([
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
                'pupa' => 'pupa-'.$butterfly->id.'-'.time().'.png',
                'male' => 'male-'.$butterfly->id.'-'.time().'.png',
                'female' => 'female-'.$butterfly->id.'-'.time().'.png',
                'caterpillar' => 'caterpillar-'.$butterfly->id.'-'.time().'.png',
            ];
            if($request->has('male')){
                Storage::delete('public/butterfly/'.$butterfly->male);
                Storage::putFileAs('public/butterfly', $request->file('male'), $image_names['male']);
                $butterfly->update([
                    'male_img_url' => $image_names['male']
                ]);
            }
            if($request->has('female')){
                Storage::delete('public/butterfly/'.$butterfly->female);
                Storage::putFileAs('public/butterfly', $request->file('female'), $image_names['female']);
                $butterfly->update([
                    'female_img_url' => $image_names['female']
                ]);
            }
            if($request->has('caterpillar')){
                Storage::delete('public/butterfly/'.$butterfly->caterpillar);
                Storage::putFileAs('public/butterfly', $request->file('caterpillar'), $image_names['caterpillar']);
                $butterfly->update([
                    'caterpillar_img_url' => $image_names['caterpillar']
                ]);
            }
            if($request->has('pupa')){
                Storage::get('public/butterfly/'.$butterfly->pupa);
                Storage::putFileAs('public/butterfly', $request->file('pupa'), $image_names['pupa']);
                $butterfly->update([
                    'pupa_img_url' => $image_names['pupa']
                ]);
            }
        });
        return redirect(route('butterflies.index'));
    }
}
