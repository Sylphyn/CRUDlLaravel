<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{

    public function index()
    {
        $student = student::all();
        return view('student.index', compact('student'));
    }


    public function create()
    {
        return view('student.create');
    }


    /**
     * @param StudentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StudentRequest $request)
    {


        $student = new student();


        if ($request->avatar) {


            $student->name = $request->input('name');
            $student->age = $request->input('age');
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(100, 100)->save('image/' . $filename);
            $student->avatar = $filename;
        } else {
            $student->name = $request->input('name');
            $student->age = $request->input('age');
            $student->avatar = 'default.jpg';
        }
        $student->save();
        return redirect('/student')->with('success', 'student is successfully saved');
//        }

    }


    public function show()
    {

    }


    public function edit($id)
    {
        $student = student::find($id);
        return view('student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {


        $student = student::find($id);
        $student->name = $request->input('name');
        $student->age = $request->input('age');

////        if ($request->file('avatar')->isValid()) {
//
//            $oldFileName = $student->avatar;
//            Storage::delete('image/'.$oldFileName);
//
//            $file = $request->file('avatar');
//            $extension = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extension;
//            Image::make($file)->resize(100,100)->save('image/'.$filename);
//            $student->avatar = $filename;
////        }
//
//        $student->save();
//
//        return redirect('/student')->with('success', 'student is updated');
        if ($request->avatar) {


            $student->name = $request->input('name');
            $student->age = $request->input('age');
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            Image::make($file)->resize(100, 100)->save('image/' . $filename);
            $student->avatar = $filename;
        } else {
            $student->name = $request->input('name');
            $student->age = $request->input('age');
            $student->avatar = 'default.jpg';
        }
        $student->save();
        return redirect('/student')->with('success', 'student is successfully saved');
//        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect('/student')->with('success', 'student deleted');

    }
}
