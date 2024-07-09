@extends('admin.layouts.app')
@section('title')
    تعديل الضبط العام
@stop
@section('contentHeader')
    الضبط
@stop
@section('contentHeaderLink')
    <a href="{{ route('admin.panel_setting.show') }}"> الضبط </a>
@stop
@section('contentHeaderActive')
    تعديل
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(isset($data) && !empty($data))
                        <form action="{{ route('admin.panel_setting.update') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="system_name">اسم الشركة</label>
                                <input type="text" name="system_name" id="system_name" class="form-control"
                                       value="{{ $data->system_name }}" placeholder="ادهل اسم الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">عنوان الشركة</label>
                                <input type="text" name="address" id="address" class="form-control"
                                       value="{{ $data->address }}" placeholder="ادهل عنوان الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">هاتف الشركة</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ $data->phone }}" placeholder="هاتف الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}" required>
                                <div class="form-group">
                                    <label for="general_alert">رسالة تنبيه اعلى الشاشة</label>
                                    <input type="text" name="general_alert" id="general_alert" class="form-control"
                                           value="{{ $data->general_alert }}" placeholder="رسالة تنبيه اعلى الشاشة"
                                           oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}">
                                </div>
                                <div class="form-group" >
                                    <label for="general_alert">شعار الشركة</label>
                                    <div class="image">
                                        <img src="{{ asset('admin-assets/uploads') . '/' . $data->photo }}"
                                             alt="لوجو الشركة" class="custom_img">
                                        <button type="button" class="btn btn-sm btn-danger" id="update_image">تغير الصورة</button>
                                        <button type="button" class="btn btn-sm btn-danger" style="display: none;" id="cancel_update_image">الغاء</button>
                                    </div>
                                </div>
                                <div id="oldImage"></div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                                </div>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            عفوا لاتوجد بيانات لعرضها
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
