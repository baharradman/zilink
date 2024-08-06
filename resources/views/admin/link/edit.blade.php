@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد لینک </li>
    </ol>
</nav>
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد لینک
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.link.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.link.update',$link->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <section class="row">

                    <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="link"> ادرس لینک</label>
                                <input type="text" class="form-control form-control-sm" name="link" id="link" value="{{ old('link', $link->link) }}">
                            </div>
                            @error('link')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                        <div class="form-group">
                                <label for="app_type">نام اپلیکیشن<</label>
                                <select name="app_type" id="app_type" class="form-control form-control-sm" id="app_type">
                                    <option value="تلگرام" @if(old('app_type',$link->app_type)==="تلگرام") selected @endif>تلگرام</option>
                                    <option value="اینستاگرام" @if(old('app_type',$link->app_type)==="اینستاگرام") selected @endif>اینستاگرام</option>
                                    <option value="ایمیل" @if(old('app_type',$link->app_type)==="ایمیل") selected @endif>ایمیل</option>
                                    <option value="واتساپ" @if(old('app_type',$link->app_type)==="واتساپ") selected @endif>واتساپ</option>
                                    <option value="وب" @if(old('app_type',$link->app_type)==="وب") selected @endif>وب</option>
                                </select>
                            </div>
                            @error('app_type')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 my-3">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')

<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>

@endsection