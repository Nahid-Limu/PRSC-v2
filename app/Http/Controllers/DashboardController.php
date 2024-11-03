<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Event;
use App\Models\Notice;
use DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $ToatalTeacher = Teacher::all()->Count();
        $ToatalEvent = Event::all()->Count();
        $ToatalNotice = Notice::all()->Count();
        return view('admin.dashboard', compact('ToatalTeacher','ToatalEvent','ToatalNotice') );
    }
}
