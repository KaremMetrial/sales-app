@extends('admin.layouts.app')
@section('title')
    الضبط العام
@stop
@section('contentHeader')
    الضبط
@stop
@section('contentHeaderLink')
    <a href="{{ route('admin.panel_setting.show') }}"> الضبط </a>
@stop
@section('contentHeaderActive')
    عرض
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(isset($data) && !empty($data))
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <td class="width30">اسم الشركة</td>
                                <td>{{ $data->system_name  }}</td>
                            </tr>
                            <tr>
                                <td class="width30">كود الشركة</td>
                                <td>{{ $data->com_code  }}</td>
                            </tr>
                            <tr>
                                <td class="width30">حالة الشركة</td>
                                <td>
                                    @if($data->active == 1)
                                        مفعل
                                    @else
                                        معطل
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">عنوان الشركة</td>
                                <td>{{ $data->address  }}</td>
                            </tr>
                            <tr>
                                <td class="width30">هاتف الشركة</td>
                                <td>{{ $data->phone  }}</td>
                            </tr>
                            <tr>
                                <td class="width30">رسالة التنبيه اعلى الشاشة للشركة</td>
                                <td>{{ $data->general_alert  }}</td>
                            </tr>
                            <tr>
                                <td class="width30">لوجو الشركة</td>
                                <td>
                                    <div class="image">
                                        <img src="{{ asset('admin-assets/uploads') . '/' . $data->photo }}"
                                             alt="لوجو الشركة" class="custom_img">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="width30">تاريخ اخر تحديث</td>
                                <td>
                                    @if($data->updated_by > 0 and $data->updated_by != null)
                                        @php
                                            $dt = DateTime::createFromFormat('Y-m-d H:i:s', $data->updated_at);
                                            $date = $dt->format("Y-m-d");
                                            $time = $dt->format("H:i");
                                            $newDateTime = $dt->format("A");
                                            $newDateTimeType = ($newDateTime == "AM") ? 'صباحا' : 'مساء';
                                        @endphp
                                        {{$date}}
                                        {{$time}}
                                        {{$newDateTimeType}}
                                        بواسطة
                                        {{$data->updated_by_admin}}
                                    @else
                                        لا يوجد تحديث
                                    @endif
                                </td>
                            </tr>
                        </table>
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
