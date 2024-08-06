@extends('assets.layouts.master-two-col')
@section('content')
<div class="card card-custom" style="box-sizing:border-box; width:700px; height:100vh">
    <div class="card-header  d-flex flex-column align-items-center" style="background-color:#89c8ff">
        <h6 class="mt-3">{{$shop->title }}</h6>
        <img src="{{asset($shop->profile_image)}}" alt="عکس پروفایل" class="profile-img rounded-circle" style="height: 80px; width:80px">
    </div>
    <div class="card-body ">
        <h6 class="card-title my-3">گالری محصولات</h6>
        <div class="row ps-2">
            @forelse($shop->productActive as $product)
            <div class="col-md-3">
                <img src="{{ url($product->image) }}" alt="{{ $product->name }} " style="height:50px; width: 50px;">
                <p>{{ $product->price }}</p>
            </div>
            @empty
            <p>ایتمی یافت نشد</p>
            @endforelse
        </div>
    </div>
    @forelse($shop->user->links as $key=>$link)
    <div class="links m-2 ">
        <a href="{{$link->link}}" class="btn btn-primary"> {{$link->app_type}}</a>
    </div>
    @empty
    <p>ایتمی یافت نشد</p>
    @endforelse
    @if($shop->user->mobile)
    <div class="card-footer text-center ">
        <p class="">شماره تماس: {{$shop->user->mobile}}</p>
    </div>
    @endif
</div>
@endsection