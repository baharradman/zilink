<!-- resources/views/partials/shops.blade.php -->
@foreach ($shops as $shop)
<section class="col-lg-3 col-md-6 col-12">
    <a href="" class="text-decoration-non text-reset">
        <div class="container mt-5">
            <div class="card card-custom" style="box-sizing:border-box">
                <div class="card-header text-center" style="background-image: url('{{ $shop->background_image }}');">
                    <h3 class="mt-3 ">{{ $shop->title }}</h3>
                    <img src="{{asset($shop->profile_image)}}" alt="عکس پروفایل" class="profile-img" style="height: 40px; width:40px">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;">گالری محصولات</h5>
                    @foreach ($shop->product as $key=>$product)
                    <div class="row gallery">
                        @if($key< 3) <div class="col-4">
                            <img src="{{ url($product->image) }}" alt="{{ $product->name }} " style="height:80px; width: 80px;">
                    </div>
                    @endif
                </div>
            </div>
            <div class="links mt-4">
                <a href="#" class="btn btn-primary">لینک ۱</a>
            </div>
            @if($shop->user->phone===true)
            <div class="card-footer text-center">
                <p>شماره تماس: {{$shop->user->phone}}</p>
            </div>
            @endif
            @endforeach
        </div>
    </a>
</section>
@endforeach