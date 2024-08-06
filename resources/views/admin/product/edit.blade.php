@extends('admin.layouts.master')

@section('head-tag')
<title>تغییر محصول</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">محتوا </a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> محصول</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> تغییر محصول</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    تغییر محصول
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                    <section class="row">
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">اسم محصول </label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name',$product->name) }}">
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
                                <label for="price">قیمت </label>
                                <input type="text" class="form-control form-control-sm" name="price" id="price" value="{{ old('price',$product->price) }}">
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
                                <label for="">انتخاب دسته</label>
                                <select name="category_id" id="" class="form-control form-control-sm">
                                    <option value="">دسته را انتخاب کنید</option>
                                    <option value="{{ $product->Category->id }}" @if(old('category_id',$product->category_id)==$product->Category->id) selected @endif> {{$product->Category->name}}</option>
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
                                    
                                    @foreach ($usershops as $usershop)
                                    <option value="{{ $usershop->id }}" @if(old('shop_id',$product->shop->id)==$usershop->id) selected @endif>{{ $usershop->title }}</option>
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
                                    <option value="0" @if(old('status', $product->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status', $product->status) == 1) selected @endif>فعال</option>
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
                        <section class="col-12">
                            <div class="form-group">
                                <label for="">توضیحات</label>
                                <textarea name="summary" id="summary" class="form-control form-control-sm" rows="6">
                                {{ old('summary',$product->summary) }}
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