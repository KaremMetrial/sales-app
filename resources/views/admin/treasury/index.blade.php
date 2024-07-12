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
                    <h3 class="card-title card_title_center">بيانات الخزن</h3>
                    <input type="hidden" name="token_search" id="token_search" value="{{ csrf_token() }}">
                    <input type="hidden" name="ajax_search_url" id="ajax_search_url"
                           value="{{ route('admin.treasury.ajax_search') }}">
                    <a href="{{ route('admin.treasury.create') }}" class="btn btn-sm btn-success">اضافة جديد</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-4">
                        <input type="text" id="search_by_text" placeholder="بحث بالاسم" class="form-control">
                    </div>
                    <br>

                    <div id="ajax_response_search">
                        @if( @isset($data) && !empty($data))
                            @php
                                $i = 1;
                            @endphp
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="custom_thead">
                                <tr>
                                    <th>مسلسل</th>
                                    <th>اسم الخزنة</th>
                                    <th>هل رئيسية</th>
                                    <th>حالة التفعيل</th>
                                    <th>اخر ايصال صرف</th>
                                    <th>اخر ايصال تحصيل</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>تاريخ التحديث</th>
                                    <th></th>
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
                                                $time = $dt->format('H:i');
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
                                        <td>
                                            <a href="{{ route('admin.treasury.edit', $info->id) }}"
                                               class="btn btn-sm btn-primary">تعديل</a>
                                            <button data-id="{{ $info->id }}" class="btn btn-sm btn-info">المزيد
                                            </button>
                                            <a href="{{ route('admin.treasury.destroy', $info->id) }}"
                                               class="btn btn-sm btn-danger">حذف</a>
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

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>

@stop
@section('script')
    <script src="{{ asset('admin-assets/js/treasury.js') }}"></script>
@stop
