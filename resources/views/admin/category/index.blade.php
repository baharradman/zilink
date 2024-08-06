@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    دسته بندی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th> دسته بندی اصلی</th>
                            <th>توضیحات</th>
                            <th>اسلاگ</th>
                            <th>عکس</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category)

                        <tr>
                            <th>{{$key+=1}}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent_id ?$category->parent->name:'منوی اصلی'}}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <img src="{{ asset($category->image) }}" alt="" width="50" height="50">
                            </td>
                            <td>
                                <label>
                                    @if ($category->status === 1)
                                    فعال
                                    @else
                                    غیر فعال
                                    @endif
                                </label>
                            </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.category.destroy', $category->id) }}" method="post">
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