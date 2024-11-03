<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Career;
use DB;
use Intervention\Image\Facades\Image as Image;
use Validator;

class CareerController extends Controller
{
    // Index Function 
    public function careerList()
    {
        
        $Career = Career::all(['id','title','salary_start','salary_end','created_at','deadline','vacancy','description']);
        // dd($Career);
        if(request()->ajax())
        {
            return datatables()->of($Career)

                    // ->addColumn('document', function($data){
                    //     $url= asset('assets/file/notice').'/'.$data->document; 
                    //     $button = " <a href='$url' type='button' class='btn btn-sm btn-outline-info'> <i class='bx bx-download'></i> Download</a>  ";
                    //     // $button .= '&nbsp;&nbsp;';
                    //     return $button;   
                    // })

                    ->editColumn('salary_range', function ($data) {
                        return $data->salary_start.' To '. $data->salary_end.' BDT';
                    })

                    ->editColumn('pulish_date', function ($data) {
                        return date('Y-m-d', strtotime($data->created_at));
                    })

                    ->editColumn('description', function ($data) {
                        $description = html_entity_decode($data->description);
                        return $description;
                    })
                    
                    ->addColumn('action', function($data){
            
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editData('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#EditCareerModal" ><i class="bx bx-edit"> Edit</i></button>';
                        $button .= '&nbsp<button type="button" onclick="deleteModal('.$data->id.',\''.$data->title.'\',\'Career List\')" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><i class="bx bx-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['salary_range','pulish_date','description','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.career.careerList');
    }

    // Add Data Function 
    public function careerAdd(Request $request)
    {
        // dd($request->all());
        //validation [start]
        $rules = array(
            'title'    =>  'required',
            'salary_start'    =>  'required',
            'salary_end'    =>  'required',
            'deadline'    =>  'required',
            'vacancy'    =>  'required',
            'description'     =>  'required',
            // 'document' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        );

        $error = Validator::make($request->all(), $rules);
        // dd($error);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //validation [end]

        $Career = new Career;

        // $Career->title = ucwords($request->title);
        $Career->title = $request->title;
        $Career->salary_start =$request->salary_start;
        $Career->salary_end =$request->salary_end;
        $Career->deadline =$request->deadline;
        $Career->vacancy =$request->vacancy;
        $Career->description =$request->description;
        $Career->save();

        if ($Career->id) {
            return response()->json(['success' => 'Career Added successfully.']);
        } else {
            return response()->json(['failed' => 'Career Added failed.']);
        }
    }

    // Delete Data Function 
    public function careerDelete($id)
    {
        $Career = Career::find($id);
        // dd($Career);
        
        if ($Career) {
            $Career->delete();
            return response()->json(['success' => 'Career Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Career Delete failed.']);
        }
    }

    // Edit Data view Function 
    public function careerEdit($id)
    {
        $Career = Career::find($id);
        return response()->json($Career);
    }

    // Update Data Function 
    public function careerUpdate(Request $request)
    {
        // dd($request->all());
        //validation [start]
        $rules = array(
            'title'    =>  'required',
            'salary_start'    =>  'required',
            'salary_end'    =>  'required',
            'deadline'    =>  'required',
            'vacancy'    =>  'required',
            'description'     =>  'required',
            // 'document' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        );

        $error = Validator::make($request->all(), $rules);
        // dd($error);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //validation [end]
        
        $Career = Career::find($request->id);
        // $Career->title = ucwords($request->title);
        $Career->title = $request->title;
        $Career->salary_start =$request->salary_start;
        $Career->salary_end =$request->salary_end;
        $Career->deadline =$request->deadline;
        $Career->vacancy =$request->vacancy;
        $Career->description =$request->description;
        $Career->save();

        if ($Career->id) {
            return response()->json(['success' => 'Career Update successfully.']);
        } else {
            return response()->json(['failed' => 'Career Update failed.']);
        }
    }
}
