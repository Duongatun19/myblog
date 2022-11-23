<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdHomeController extends Controller
{
    public function HomeAdmin(){
     
        return view('Admin/HomeAdmin');
    }
}
