@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
      <script>
           CKEDITOR.replace('body',{
          filebrowserUploadUrl:'/admin/panel/upload-image',
          filebrowserImageUploadUrl :'/admin/panel/upload-image'
          });
      </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ایجاد دوره</h2>
        </div>
        <form class="form-horizontal" action="{{ route('Courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">عنوان مقاله</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="type" class="control-label">نوع دوره</label>
                 <select class="form-control" name="type" id="type">
                     <option value="free" selected>رایگان</option>
                     <option  value="cash">نقدی</option>
                     <option  value="vip">اعضای ویژه</option>
                 </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="body" id="body" placeholder="متن مقاله را وارد کنید"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">تصویر دوره</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را وارد کنید" value="{{ old('images') }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value="{{ old('tags') }}">
                </div>
                <div class="col-sm-6">
                    <label for="price" class="control-label">قیمت</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="قیمت را واردکنید" value="{{ old('price') }}">
                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection
