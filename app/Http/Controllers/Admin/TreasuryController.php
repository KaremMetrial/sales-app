<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreasuryRequest;
use App\Models\Admin;
use App\Models\Treasury;
use Exception;

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

    public function create()
    {
        return view('admin.treasury.create');
    }

    public function store(TreasuryRequest $request)
    {
        try {
            // Get the company code of the authenticated user
            $com_code = auth()->user()->com_code;

            // Check if a treasury with the same name and company code already exists
            $check_exists = Treasury::where(['name' => $request->input('name'), 'com_code' => $com_code])->first();

            // If no existing treasury is found, proceed to create a new one
            if ($check_exists == null) {
                // If the new treasury is marked as master, ensure no other master treasury exists for the same company
                if ($request->is_master == 1) {
                    $check_exists_master = Treasury::where(['is_master' => 1, 'com_code' => $com_code])->first();
                    if ($check_exists_master != null) {
                        return redirect()->back()->with(['error' => 'عفوا يوجد خزنة رئيسية بالفعل']);
                    }
                }

                // Create a new Treasury record
                $data = new Treasury();
                $data->name = $request->input('name');
                $data->is_master = $request->input('is_master');
                $data->last_receipt_exchange = $request->input('last_receipt_exchange');
                $data->last_receipt_collect = $request->input('last_receipt_collect');
                $data->active = $request->input('active');
                $data->created_at = now();
                $data->added_by = auth()->user()->id;
                $data->updated_by = auth()->user()->id;
                $data->date = now();
                $data->com_code = $com_code;
                $data->save();

                // Redirect to the index route with a success message
                return redirect()->route('admin.treasury.index')->with(['success' => 'تم حفظ البيانات بنجاح']);
            } else {
                // If the treasury name already exists, return with an error message
                return redirect()->back()->with(['error' => 'عفوا اسم الخزنة مسجل من قبل']);
            }
        } catch (Exception $exception) {
            // In case of an error, return with an error message including the exception details
            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما ' . $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            // Find the Treasury record by its ID
            $data = Treasury::find($id);

            // Check if the record exists
            if ($data) {
                // Delete the record
                $data->delete();
                // Redirect back with a success message
                return redirect()->route('admin.treasury.index')->with(['success' => 'تم حذف الخزنة بنجاح']);
            } else {
                // If the record does not exist, return with an error message
                return redirect()->route('admin.treasury.index')->with(['error' => 'عفوا، الخزنة غير موجودة']);
            }
        } catch (Exception $exception) {
            // Handle any exceptions and return with an error message
            return redirect()->route('admin.treasury.index')->with(['error' => 'عفوا حدث خطأ ما ' . $exception->getMessage()]);
        }
    }
}