<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('dashboard_access')){
            // $pettyCashes = PettyCash::where('requested_by',auth()->user()->id)->get();
            return view('admin.dashboard.index');
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
}
