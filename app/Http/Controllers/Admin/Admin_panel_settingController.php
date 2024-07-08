<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_panel_settingController extends Controller
{
    public function index()
    {
        $data = Admin_panel_setting::where('com_code',auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data->update_by > 0 and $data->update_by != null) {
                $data->updated_by_admin = Admin::where('id',$data->updated_by)->value('name');
            }
            else {
                $data->updated_by_admin = "Admin";
            }
        }
        return view('admin.admin_panel_setting.index',compact('data'));
    }
}
