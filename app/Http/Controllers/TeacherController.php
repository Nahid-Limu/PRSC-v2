<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use DB;
use Intervention\Image\Facades\Image as Image;
use Validator;

class TeacherController extends Controller
{
    public function teacherList()
    {
        
        $Teacher = Teacher::all(['id','name','designation','teachers_words','image']);
        // dd($Teacher);
        if(request()->ajax())
        {
            return datatables()->of($Teacher)
            
                    ->addColumn('image', function($data){
                        $url= asset('assets/img/teachers').'/'.$data->image; 
                        $button = " <div class='text-center'>
                                        <img src='$url' class='img-fluid' style='widows: 40px; height: 40px;'>
                                    </div>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })
                    
                    ->addColumn('action', function($data){
            
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editData('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#EditTeacherModal" ><i class="bx bx-edit"> Edit</i></button>';
                        $button .= '&nbsp<button type="button" onclick="deleteModal('.$data->id.',\''.$data->name.'\',\'Teacher List\')" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><i class="bx bx-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['image','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.teacher.teacherList');
    }

    public function teacherAdd(Request $request)
    {
        // dd($request->all());
        $rules = array(
            'name'    =>  'required',
            'designation'     =>  'required',
            'teachers_words'     =>  'required',
            'image' => 'required | file | mimes:jpg,jpeg,png,gif | max:2048',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        if ($request->hasFile('image')) {
            
            $Teacher = new Teacher;

            // $Teacher->name = ucwords($request->name);
            // $Teacher->designation = ucwords($request->designation);
            $Teacher->name = $request->name;
            $Teacher->designation = $request->designation;
            $Teacher->teachers_words =$request->teachers_words;
            
                $image = $request->file('image');

                $filename = $request->name.'.'.$image->getClientOriginalExtension();
                $path = public_path('assets/img/teachers/' . $filename);
                Image::make($image->getRealPath())->resize(600, 600)->save($path);
                // dd(121);
            $Teacher->image =$filename;
            $Teacher->save();

            if ($Teacher->id) {
                return response()->json(['success' => 'Teacher Added successfully.']);
            } else {
                return response()->json(['failed' => 'Teacher Added failed.']);
            }


        }
    }

    public function teacherDelete($id)
    {
        $Teacher = Teacher::find($id);
        // dd($Teacher);
        $image=$Teacher->image;

        if($image!=null){
            $path = public_path() . "/assets/img/teachers/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Teacher) {
            $Teacher->delete();
            return response()->json(['success' => 'Teacher Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Teacher Delete failed.']);
        }
    }

    public function teacherEdit($id)
    {
        $Teacher = Teacher::find($id);
        return response()->json($Teacher);
    }
    
    // Update data
    public function teacherUpdate(Request $request)
    {
        // dd($request->all());

        // Find the record by id
        $Teacher = Teacher::find($request->id);

        // Update text fields
        $Teacher->name = $request->name;
        $Teacher->designation = $request->designation;
        $Teacher->teachers_words =$request->teachers_words;

        // Check if an image file is uploaded
        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($Teacher->image && file_exists(public_path('assets/img/teachers/' . $Teacher->image) ) ) {
                unlink(public_path('assets/img/teachers/' . $Teacher->image));
            }

            // Store the new image
            $image = $request->file('image');
            $filename = $request->name.'.'.$image->getClientOriginalExtension();
            $path = public_path('assets/img/teachers/' . $filename);
            Image::make($image->getRealPath())->resize(600, 600)->save($path);

            // Save image name to the database
            $Teacher->image =$filename;
        }

        // Save updated model
        $Teacher->save();

        if ($Teacher->id) {
            return response()->json(['success' => 'Teacher Update successfully.']);
        } else {
            return response()->json(['failed' => 'Teacher Update failed.']);
        }

    }
}
