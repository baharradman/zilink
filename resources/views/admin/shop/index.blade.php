@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">محتوا</a></li>
        <li class="breadcrumb-item active" aria-current="page">فروشگاه</li>
    </ol>
</nav>

<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>فروشگاه</h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom">
                <a href="{{route('admin.shop.create')}}" class="btn btn-info btn-sm">ایجاد فروشگاه</a>
                <div class="width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان فروشگاه</th>
                            <th>دسته بندی </th>
                            <th>توضیحات</th>
                            <th>آدرس</th>
                            <th>وضعیت</th>
                            <th>عکس</th>
                            <th><i class="fa fa-cogs"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $key=>$shop)
                        <tr>
                            <th>{{$key+=1}}</th>
                            <td>{{ $shop->title }}</td>
                            <td>{{ $shop->category->name}}</td>
                            <td>{{ $shop->description }}</td>
                            <td>{{ $shop->address }}</td>
                            <td>
                                <label>
                                    @if ($shop->status === 1)
                                    فعال
                                    @else
                                    غیر فعال
                                    @endif
                                </label>
                            </td>
                            <td>
                                <img src="{{ asset($shop->profile_image ) }}" alt="" width="50" height="50">
                            </td>

                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.shop.edit', $shop->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.shop.destroy', $shop->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>
@endsection