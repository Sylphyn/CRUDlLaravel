<?php

namespace App\Http\Controllers;
use App\sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic as Image;
class SVController extends Controller
{

    public function index()
    {
        $sinhvien = sinhvien::all();

        return view('sinhvien.index', compact('sinhvien'));
    }


    public function create()
    {

        return view('sinhvien.create');
    }


    public function store(Request $request)
    {
//        $validatedData = $request->validate([
//            'name' => 'required|max:255',
//            'age' => 'required',
//            'avatar' => 'required|image|max:2048'
//        ]);
//
//        if ($request->hasFile('avatar')){
//            $request->file('avatar');
//            $request->avatar->storeAs('public' , 'bit.png');
//        }
//        $sinhvien = sinhvien::create($validatedData);

        $sinhvien = new sinhvien();
        $sinhvien->name = $request->input('name');
        $sinhvien->age = $request->input('age');

        if ($request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(100,100)->save($filename);
            $sinhvien->avatar = $filename;
        }

        $sinhvien->save();

//        $avatarName = $sinhvien->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
//
//        $request->avatar->storeAs('avatars',$avatarName);
//
//        $sinhvien->avatar = $avatarName;

        return redirect('/sinhvien')->with('success', 'sinhvien is successfully saved');

    }

    public function show()
    {

    }


    public function edit($id)
    {
        $sinhvien = sinhvien::findOrFail($id);

        return view('sinhvien.edit', compact('sinhvien'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'avatar' => 'required',
        ]);

        sinhvien::whereId($id)->update($validatedData);

        return redirect('/sinhvien')->with('success', 'Sinhvien is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinhvien = sinhvien::findOrFair($id);
        $sinhvien->delete();
        return redirect('/sinhvien')->with('success', 'sinhvien deleted');

    }
}
