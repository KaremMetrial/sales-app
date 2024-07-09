<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\General;
use App\Http\Requests\Edit_admin_panelRequest;
use App\Models\Admin;
use App\Models\Admin_panel_setting;
use Exception;

class Admin_panel_settingController extends Controller
{
    public function index()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        if (!empty($data)) {
            if ($data->update_by > 0 and $data->update_by != null) {
                $data->updated_by_admin = Admin::where('id', $data->updated_by)->value('name');
            } else {
                $data->updated_by_admin = "Admin";
            }
        }
        return view('admin.admin_panel_setting.index', compact('data'));
    }

    public function edit()
    {
        $data = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panel_setting.edit', compact('data'));

    }

    public function update(Edit_admin_panelRequest $request)
    {
        try {
            $admin_panel_setting = Admin_panel_setting::where('com_code', auth()->user()->com_code)->first();
            $admin_panel_setting->system_name = $request->input('system_name');
            $admin_panel_setting->address = $request->input('address');
            $admin_panel_setting->phone = $request->input('phone');
            $admin_panel_setting->general_alert = $request->input('general_alert');
            $admin_panel_setting->updated_by = auth()->user()->id;
            $admin_panel_setting->updated_at = now();
            $oldPhoto = $admin_panel_setting->photo;

            if ($request->has('photo')) {
                $request->validate([
                    'photo' => 'required|mimes:png,jpg,jpeg|max:2000',
                ]);
                $path = public_path('admin-assets/uploads');
                $photo = $request->file('photo');
                $the_file_path = uploadImage($path, $photo);
                $admin_panel_setting->photo = $the_file_path;
                if (file_exists($path . '/' . $oldPhoto)) {
                    unlink($path . '/' . $oldPhoto);
                }
            }
            $admin_panel_setting->save();
            return redirect()->route('admin.panel_setting.show')->with(['success' => 'تم تغيير البيانات بنجاح']);
        } catch (Exception $exception) {
            return redirect()->route('admin.panel_setting.show')->with(['error' => 'عفوا حدث خطا ما' . $exception->getMessage()]);
        }
    }
}
