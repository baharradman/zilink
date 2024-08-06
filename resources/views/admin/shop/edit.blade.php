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
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> تغییر فروشگاه</li>
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
                <form action="{{ route('admin.shop.update',$shop->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <section class="row">
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="title">عنوان فروشگاه </label>
                                <input type="text" class="form-control form-control-sm" name="title" id="title" value="{{ old('title',$shop->title) }}">
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
                                <label for="">انتخاب دسته</label>
                                <select name="category_id" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    <option value="{{ $shop->Category->id }}" @if(old('category_id',$shop->category_id)==$shop->Category->id) selected @endif> {{$shop->Category->name}}</option>
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
                                <input type="text" class="form-control form-control-sm" name="address" id="address" value="{{ old('address',$shop->address) }}">
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
                                    <option value="0"  @if(old('status', $shop->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status', $shop->status) == 1) selected @endif>فعال</option>
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

                        <section class="col-12 col-md-6 my-2">
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
                                {{ old('description',$shop->description) }}
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