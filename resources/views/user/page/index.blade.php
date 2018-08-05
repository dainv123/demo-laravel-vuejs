@extends('user.master')
@section('description', 'ABC')
@section('content')
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">
        @foreach($products as $item)
        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="{!! URL('product-detail', [$item['id'], $item['alias']]) !!}">
                <img src="{!! '/images/'.$item['image'] !!}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>From {!! number_format($item['price'],0,",",".") !!}</p>
                    <h4>{!! $item['name'] !!}</h4>
                </div>
            </a>
        </div>
		@endforeach
    </div>
</div>
<!-- Product Catagories Area End -->
@endsection