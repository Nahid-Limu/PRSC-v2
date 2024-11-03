<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use DB;
use Intervention\Image\Facades\Image as Image;
use Validator;

class NoticeController extends Controller
{
    // Index Function 
    public function noticeList()
    {
        
        $Notice = Notice::all(['id','title','pulish_date','description','document']);
        // dd($Notice);
        if(request()->ajax())
        {
            return datatables()->of($Notice)

                    ->addColumn('document', function($data){
                        $url= asset('assets/file/notice').'/'.$data->document; 
                        $button = " <a href='$url' type='button' class='btn btn-sm btn-outline-info'> <i class='bx bx-download'></i> Download</a>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })

                    ->editColumn('pulish_date', function ($data) {
                        return date('j F , Y', strtotime($data->pulish_date));
                    })

                    ->editColumn('description', function ($data) {
                        $description = html_entity_decode($data->description);
                        return $description;
                    })
                    
                    ->addColumn('action', function($data){
            
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editData('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#EditNoticeModal" ><i class="bx bx-edit"> Edit</i></button>';
                        $button .= '&nbsp<button type="button" onclick="deleteModal('.$data->id.',\''.$data->title.'\',\'Notice List\')" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><i class="bx bx-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['description','document','pulish_date','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.notice.noticeList');
    }

    // Add Data Function 
    public function noticeAdd(Request $request)
    {
        // dd($request->all());
        //validation [start]
        $rules = array(
            'title'    =>  'required',
            'pulish_date'    =>  'required',
            'description'     =>  'required',
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
            
            $Notice = new Notice;

            // $Notice->title = ucwords($request->title);
            $Notice->title = $request->title;
            $Notice->pulish_date =$request->pulish_date;
            $Notice->description =$request->description;

                $document = $request->file('document');

                $filename = $request->title.'.'.$document->getClientOriginalExtension();
                $document->move(public_path().'/assets/file/notice/', $filename);  

            $Notice->document =$filename;
            $Notice->save();

            if ($Notice->id) {
                return response()->json(['success' => 'Notice Added successfully.']);
            } else {
                return response()->json(['failed' => 'Notice Added failed.']);
            }


        }
    }

    // Delete Data Function 
    public function noticeDelete($id)
    {
        $Notice = Notice::find($id);
        // dd($Notice);
        $document=$Notice->document;

        if($document!=null){
            $path = public_path() . "/assets/file/notice/" . $document;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Notice) {
            $Notice->delete();
            return response()->json(['success' => 'Notice Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Notice Delete failed.']);
        }
    }

    // Edit Data view Function 
    public function noticeEdit($id)
    {
        $Notice = Notice::find($id);
        return response()->json($Notice);
    }

    // Update Data Function 
    public function noticeUpdate(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('document')) {

            $Notice = Notice::find($request->id);
            
            $document=$Notice->document;

            if($document!=null){
                $path = public_path('/assets/file/notice/' . $document);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            
            // $Notice->title = ucwords($request->title);
            $Notice->title = $request->title;
            $Notice->pulish_date =$request->pulish_date;
            $Notice->description =$request->description;

                $document = $request->file('document');

                $filename = $request->title.'.'.$document->getClientOriginalExtension();
                $document->move(public_path().'/assets/file/notice/', $filename);  

            $Notice->document =$filename;
            $Notice->save();

            if ($Notice->id) {
                return response()->json(['success' => 'Notice Update successfully.']);
            } else {
                return response()->json(['failed' => 'Notice Update failed.']);
            }


        }else {
            $Notice = Notice::find($request->id);
            // $Notice->title = ucwords($request->title);
            $Notice->title = $request->title;
            $Notice->pulish_date =$request->pulish_date;
            $Notice->description =$request->description;
            $Notice->save();

            if ($Notice->id) {
                return response()->json(['success' => 'Notice Update successfully.']);
            } else {
                return response()->json(['failed' => 'Notice Update failed.']);
            }

        }
    }
}
