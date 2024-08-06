@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد فروشگاه</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">محتوا </a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> فروشگاه</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد فروشگاه</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد فروشگاه
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.shop.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="title">عنوان فروشگاه </label>
                                <input type="text" class="form-control form-control-sm" name="title" id="title" value="{{ old('title') }}">
                            </div>
                            @error('title')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="category_id">دسته ی اصلی </label>
                                <select name="category_id" class="form-control form-control-sm">
                                    @foreach($shopCategories as $category)
                                    @include('assets.layouts.partials.category_option', ['category' => $category, 'level' => 0])
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="address">آدرس ها</label>
                                <input type="text" class="form-control form-control-sm" name="address" id="address" value="{{ old('address') }}">
                            </div>
                            @error('address')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status')==0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status')==1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="profile_image">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="profile_image" id="profile_image">
                            </div>
                            @error('profile_image')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12">
                            <div class="form-group">
                                <label for="">توضیحات</label>
                                <textarea name="description" id="description" class="form-control form-control-sm" rows="6">
                                {{ old('description') }}
                                </textarea>
                            </div>
                            @error('description')
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