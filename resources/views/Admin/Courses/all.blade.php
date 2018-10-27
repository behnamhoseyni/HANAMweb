@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>دوره ها</h2>
            <a href="{{ route('Courses.create') }}" class="btn btn-sm btn-primary">ایجاد دوره</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>عنوان دوره</th>
                    <th>تعداد نظرات</th>
                    <th>مقدار بازدید</th>
                    <th>تعداد شرکت کننده ها</th>
                    <th>وضعیت دوره</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Courses as $Course)
                    <tr>
                        <td><a href="{{ $Course->path() }}">{{ $Course->title }}</a></td>
                        <td>{{ $Course->commentCount }}</td>
                        <td>{{ $Course->viewCount }}</td>
                        <td>1</td>
                        <td>{{ $Course->type}}</td>
                        <td>
                            <form action="{{ route('Courses.destroy'  , ['id' => $Course->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}

                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('Courses.edit' , ['id' => $Course->id]) }}"  class="btn btn-primary">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align:center">
            {{$Courses->render()}}
        </div>
    </div>
@endsection
