<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use DB;
use Intervention\Image\Facades\Image as Image;
use Validator;

class EventController extends Controller
{
    public function eventList()
    {
        
        $Event = Event::all(['id','title','event_date','event_time','description','image']);
        // dd($Event);
        if(request()->ajax())
        {
            return datatables()->of($Event)
            
                    ->addColumn('image', function($data){
                        $url= asset('assets/img/events').'/'.$data->image; 
                        $button = " <div class='text-center'>
                                        <img src='$url' class='img-fluid' style='widows: 40px; height: 40px;'>
                                    </div>  ";
                        // $button .= '&nbsp;&nbsp;';
                        return $button;   
                    })

                    ->editColumn('event_date', function ($data) {
                        return date('l, F jS, Y', strtotime($data->event_date));
                    })

                    ->editColumn('event_time', function ($data) {
                        return date('h:i A', strtotime($data->event_time));
                    })
                    
                    ->addColumn('action', function($data){
            
                        $button = '<div class="d-flex justify-content-center"><button type="button" onclick="editData('.$data->id.')" name="edit" id="'.$data->id.'" class="edit btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#EditEventModal" ><i class="bx bx-edit"> Edit</i></button>';
                        $button .= '&nbsp<button type="button" onclick="deleteModal('.$data->id.',\''.$data->title.'\',\'Event List\')" name="delete" id="'.$data->id.'" class="delete btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal" ><i class="bx bx-trash"> Delete</i></button></div>';
                        
                        return $button;
                    })
                    ->rawColumns(['image','event_date','event_time','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.event.eventList');
    }

    public function eventAdd(Request $request)
    {
        // dd($request->all());
        //validation [start]
        $rules = array(
            'title'    =>  'required',
            'event_date'    =>  'required',
            'event_time'    =>  'required',
            'description'     =>  'required',
            'image' => 'required | file | mimes:jpg,jpeg,png,gif | max:2048',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        //validation [end]

        if ($request->hasFile('image')) {
            
            $Event = new Event;

            // $Event->title = ucwords($request->title);
            $Event->title = $request->title;
            $Event->event_date =$request->event_date;
            $Event->event_time =$request->event_time;
            $Event->description =$request->description;

                $image = $request->file('image');

                $filename = $request->title.'.'.$image->getClientOriginalExtension();
                $path = public_path('assets/img/events/' . $filename);
                Image::make($image->getRealPath())->resize(800, 533)->save($path);

            $Event->image =$filename;
            $Event->save();

            if ($Event->id) {
                return response()->json(['success' => 'Event Added successfully.']);
            } else {
                return response()->json(['failed' => 'Event Added failed.']);
            }


        }
    }

    public function eventDelete($id)
    {
        $Event = Event::find($id);
        // dd($Teacher);
        $image=$Event->image;

        if($image!=null){
            $path = public_path() . "/assets/img/events/" . $image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        if ($Event) {
            $Event->delete();
            return response()->json(['success' => 'Event Delete Successfully....!!!']);
        } else {
            return response()->json(['failed' => 'Event Delete failed.']);
        }
    }

    public function eventEdit($id)
    {
        $Event = Event::find($id);
        return response()->json($Event);
    }

    public function eventUpdate(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {

            $Event = Event::find($request->id);
            
            $image=$Event->image;

            if($image!=null){
                $path = public_path('assets/img/events/' . $image);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            
            // $Event->title = ucwords($request->title);
            $Event->title = $request->title;
            $Event->event_date =$request->event_date;
            $Event->event_time =$request->event_time;
            $Event->description =$request->description;

                $image = $request->file('image');

                $filename = $request->title.'.'.$image->getClientOriginalExtension();
                $path = public_path('assets/img/events/' . $filename);
                Image::make($image->getRealPath())->resize(800, 533)->save($path);

            $Event->image =$filename;
            $Event->save();

            if ($Event->id) {
                return response()->json(['success' => 'Event Update successfully.']);
            } else {
                return response()->json(['failed' => 'Event Update failed.']);
            }


        }else {
            $Event = Event::find($request->id);
            // $Event->title = ucwords($request->title);
            $Event->title = $request->title;
            $Event->event_date =$request->event_date;
            $Event->event_time =$request->event_time;
            $Event->description =$request->description;
            $Event->save();

            if ($Event->id) {
                return response()->json(['success' => 'Event Update successfully.']);
            } else {
                return response()->json(['failed' => 'Event Update failed.']);
            }

        }
    }
}
