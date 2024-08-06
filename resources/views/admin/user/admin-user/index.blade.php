@extends('admin.layouts.master')

@section('head-tag')
<title>کاربران ادمین</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> کاربران ادمین</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    کاربران ادمین
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ایمیل</th>
                            <th>وضعیت</th>
                            <th>نقش</th>
                            <th>سطوح دسترسی</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($admins as $key => $admin)

                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <label>
                                    @if ($admin->status === 1)
                                    فعال
                                    @else
                                    غیر فعال
                                    @endif
                                </label>
                            </td>
                            <td>
                                @forelse($admin->roles as $role)
                                <div>
                                    {{ $role->name }}
                                </div>
                                @empty
                                <div class="text-danger">
                                    نقشی یافت نشد
                                </div>
                                @endforelse
                            </td>
                            <td>
                                @forelse($admin->permissions as $permission)
                                <div>
                                    {{ $permission->name }}
                                </div>
                                @empty
                                <div class="text-danger">
                                    سطوح دسترسی یافت نشد
                                </div>
                                @endforelse
                            </td>
                            <td class="width-22-rem text-left">
                                <a href="{{ route('admin.user.admin-user.permissions', $admin->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-user-shield"></i></a>
                                <a href="{{ route('admin.user.admin-user.roles', $admin->id) }}" class="btn btn-info btn-sm"><i class="fa fa-user-check"></i></a>
                                <a href="{{ route('admin.user.admin-user.edit', $admin->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <form class="d-inline" action="{{ route('admin.user.admin-user.destroy', $admin->id) }}" method="post">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i></button>
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
