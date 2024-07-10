@extends('admin.layouts.app')
@section('title')
    الضبط العام
@stop
@section('contentHeader')
    الخزن
@stop
@section('contentHeaderLink')
    <a href="{{ route('admin.treasury.index') }}"> الخزن </a>
@stop
@section('contentHeaderActive')
    عرض
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(isset($data) && !empty($data))
                        @php
                            $i = 1;
                        @endphp
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>مسلسل</th>
                                <th>اسم الخزنة</th>
                                <th>هل رئيسية</th>
                                <th>حالة التفعيل</th>
                                <th>اخر ايصال صرف</th>
                                <th>اخر ايصال تحصيل</th>
                                <th>تاريخ الاضافة</th>
                                <th>تاريخ التحديث</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $info)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>
                                        @if($info->is_master==1)
                                            رئيسية
                                        @else
                                            فرعية
                                        @endif
                                    </td>
                                    <td>
                                        @if($info->active==1)
                                            مفعلة
                                        @else
                                            معطلة
                                        @endif
                                    </td>
                                    <td>{{ $info->last_receipt_exchange }}</td>
                                    <td>{{ $info->last_receipt_collect }}</td>
                                    <td>
                                        @php
                                            $dt = new DateTime($info->created_at);
                                            $date = $dt->format('Y-m-d');
                                            $time = $dt->format('g:i');
                                            $newDateTime = date("A",strtotime($time));
                                            $newDateTimeType = (($newDateTime == "AM") ? 'صباحا' : 'مساء');
                                        @endphp
                                        {{ $date }}
                                        {{ $time }}
                                        {{ $newDateTimeType }}
                                        بواسطة
                                        {{ $info->added_by_name }}
                                    </td>
                                    <td>
                                        @if( $info->updated_at != null )
                                            @php
                                                $dt = new DateTime($info->updated_at);
                                                $date = $dt->format('Y-m-d');
                                                $time = $dt->format('g:i');
                                                $newDateTime = date("A",strtotime($time));
                                                $newDateTimeType = (($newDateTime == "AM") ? 'صباحا' : 'مساء');
                                            @endphp
                                            {{ $date }}
                                            {{ $time }}
                                            {{ $newDateTimeType }}
                                            بواسطة
                                            {{ $info->updated_by_name }}
                                        @else
                                            لا يوجد تحديث
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $data->links() }}
                        </div>
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

@stop
