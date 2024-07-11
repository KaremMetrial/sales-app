@extends('admin.layouts.app')
@section('title')
    الضبط العام
@stop
@section('contentHeader')
    تعديل خزنة
@stop
@section('contentHeaderLink')
    <a href="{{ route('admin.treasury.edit', $data->id) }}"> تعديل خزنة </a>

@stop
@section('contentHeaderActive')
    عرض
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center"> تعديل على الخزنة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(isset($data) && !empty($data))
                        <form action="{{ route('admin.treasury.update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الخزنة</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="ادهل اسم الخزنة" value="{{ $data->name }}"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="is_master">هل رئيسية</label>
                                <select name="is_master" id="is_master" class="form-control">
                                    <option value="">اختر النوع</option>
                                    <option @if( $data->is_master ==  1) selected="selected" @endif value="1">رئيسية
                                    </option>
                                    <option @if( $data->is_master ==  0) selected="selected" @endif value="0">فرعية
                                    </option>
                                </select>
                                @error('is_master')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_receipt_exchange">اخر رقم ايصال للصرف</label>
                                <input type="text" name="last_receipt_exchange" id="last_receipt_exchange"
                                       class="form-control" value="{{ $data->last_receipt_exchange }}"
                                       placeholder="اخر رقم ايصال للصرف"
                                       oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}">
                            </div>
                            @error('last_receipt_exchange')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="last_receipt_collect">اخر رقم ايصال تحصيل</label>
                                <input type="text" name="last_receipt_collect" id="last_receipt_collect"
                                       class="form-control" value="{{ $data->last_receipt_collect }}"
                                       placeholder="اخر رقم ايصال تحصيل"
                                       oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try {
                                    setCustomValidity('')
                                }catch (e) {}">
                            </div>
                            @error('last_receipt_collect')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="active">حالة التفعيل</label>
                                <select name="active" id="active" class="form-control" value="{{ old('active') }}">
                                    <option value="">اختر حالة التفعيل</option>
                                    <option @if( $data->active ==  0) selected="selected" @endif value="0">معطلة
                                    </option>
                                    <option @if($data->active ==  1) selected="selected" @endif value="1">مفعلة</option>
                                </select>
                                @error('active')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm">حفظ التعديل</button>
                                <a href="{{ route('admin.treasury.index') }}" class="btn btn-sm btn-danger"> الغاء </a>
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

@stop
