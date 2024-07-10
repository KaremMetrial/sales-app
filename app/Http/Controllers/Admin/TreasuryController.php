<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Treasury;

class TreasuryController extends Controller
{
    //
    public function index()
    {
        $data = Treasury::orderBy('id', 'desc')->paginate(PAGINATION_COUNT);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_name = Admin::where('id', $info->added_by)->value('name');

                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_name = Admin::where('id', $info->updated_by)->value('name');
                }
            }
        }
        return view('admin.treasury.index', compact('data'));
    }
}
