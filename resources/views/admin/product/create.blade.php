@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> محصولات</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> اضافه کردن محصول</li>
    </ol>
</nav>
<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    اضافه کردن محصول
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">نام محصول</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
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
                                    @foreach($categories as $category)
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
                                <label for="">انتخاب فروشگاه</label>
                                <select name="shop_id" id="" class="form-control form-control-sm">
                                    <option value="">فروشگاه خود را انتخاب کنید</option>
                                    @foreach ($usershops as $usershop)
                                    <option value="{{ $usershop->id }}" @if(old('shop_id')==$usershop->id) selected @endif>{{ $usershop->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('shop_id')
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
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="price">قیمت</label>
                                    <input type="text" class="form-control form-control-sm" name="price" id="price" value="{{ old('price') }}">
                                </div>
                                @error('price')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">خلاصه</label>
                                    <textarea name="summary" id="summary" class="form-control form-control-sm" rows="6">
                                    {{ old('summary') }}
                                    </textarea>
                                </div>
                                @error('summary')
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