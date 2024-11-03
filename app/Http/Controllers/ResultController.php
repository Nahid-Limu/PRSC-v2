<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Result;
use DB;
use Intervention\Image\Facades\Image as Image;
use Validator;

class ResultController extends Controller
{
    // Index Function 
    public function resultList()
    {
        
        $Result = Result::all(['id','class','exam_name','document','created_at']);
        // dd($Result);
        if(request()->ajax())
        {
            return datatables()->of($Result)

                    ->addColumn('document', function($data){
                        $url= asset('assets/file/result').'/'.$data->document; 
                        $button = " <a href='$url' type='button' class='btn btn-sm btn-outline-info' title='Download Result Sheet -> $data->document'> <i class='bx bx-download'></i> Download</a>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })

                    ->editColumn('result_year', function ($data) {
                        return date('Y', strtotime($data->created_at));
                    })
                    
                    ->addColumn('action', function($data){
            
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editData('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#EditResultModal" ><i class="bx bx-edit"> Edit</i></button>';
                        $button .= '&nbsp<button type="button" onclick="deleteModal('.$data->id.',\''.$data->class.'\',\'Result List\')" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><i class="bx bx-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['document','result_year','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.result.resultList');
    }

    // Add Data Function 
    public function resultAdd(Request $request)
    {
        // dd($request->all());
        //validation [start]
        $rules = array(
            'class'    =>  'required',
            'exam_name'     =>  'required',
            'document' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
        );

        $error = Validator::make($request->all(), $rules);
        // dd($error);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //validation [end]

        if ($request->hasFile('document')) {
            
            $Result = new Result;

            // $Result->class = ucwords($request->class);
            // $Result->exam_name =ucwords($request->exam_name);
            $Result->class = $request->class;
            $Result->exam_name = $request->exam_name;

                $document = $request->file('document');

                $filename = $request->class.'-('.$request->exam_name.').'.$document->getClientOriginalExtension();
                $document->move(public_path().'/assets/file/result/', $filename);  

            $Result->document =$filename;
            $Result->save();

            if ($Result->id) {
                return response()->json(['success' => 'Result Added successfully.']);
            } else {
                return response()->json(['failed' => 'Result Added failed.']);
            }


        }
    }

    // Delete Data Function 
    public function resultDelete($id)
    {
        $Result = Result::find($id);
        // dd($Result);
        $document=$Result->document;

        if($document!=null){
            $path = public_path() . "/assets/file/result/" . $document;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Result) {
            $Result->delete();
            return response()->json(['success' => 'Result Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Result Delete failed.']);
        }
    }

    // Edit Data view Function 
    public function resultEdit($id)
    {
        $Result = Result::find($id);
        return response()->json($Result);
    }

    // Update Data Function 
    public function resultUpdate(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('document')) {

            $Result = Result::find($request->id);
            
            $document=$Result->document;

            if($document!=null){
                $path = public_path('/assets/file/result/' . $document);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            
            // $Result->class = ucwords($request->class);
            // $Result->exam_name =ucwords($request->exam_name);
            $Result->class = $request->class;
            $Result->exam_name = $request->exam_name;
            
                $document = $request->file('document');

                $filename = $request->class.'-('.$request->exam_name.').'.$document->getClientOriginalExtension();
                $document->move(public_path().'/assets/file/result/', $filename);  

            $Result->document =$filename;
            $Result->save();

            if ($Notice->id) {
                return response()->json(['success' => 'Result Update successfully.']);
            } else {
                return response()->json(['failed' => 'Result Update failed.']);
            }


        }else {
            $Result = Result::find($request->id);
            // $Result->class = ucwords($request->class);
            // $Result->exam_name =ucwords($request->exam_name);
            $Result->class = $request->class;
            $Result->exam_name = $request->exam_name;
            $Result->save();

            if ($Result->id) {
                return response()->json(['success' => 'Result Update successfully.']);
            } else {
                return response()->json(['failed' => 'Result Update failed.']);
            }

        }
    }
}
