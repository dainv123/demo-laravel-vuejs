@extends('user.master')
@section('description', 'ABC')
@section('content')
<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                        <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach($productimages as $item)
                            <li @if ($loop->first) class="active" @endif data-target="#product_details_slider" data-slide-to="{!!  $loop->index  !!}" style="background-image: url({!! '/images/'.$item['image'] !!});">
                            </li>
                        @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($productimages as $item)
                            <div @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
                                <a class="gallery_img" href="{!! '/images/'.$item['image'] !!}">
                                    <img class="d-block w-100" src="{!! '/images/'.$item['image'] !!}" alt="First slide">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">${!! number_format($products['price'],0,",",".") !!}</p>
                        <a href="product-details.html">
                            <h6>{!! $products['name'] !!}</h6>
                        </a>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="review">
                                <a href="#">Write A Review</a>
                            </div>
                        </div>
                        <!-- Avaiable -->
                        <p class="avaibility"><i class="fa fa-circle"></i>
                         @if($products['avaibility'] == 'instock') In Stock
                         @else Not Available
                         @endif
                         </p>
                    </div>

                    <div class="short_overview my-5">
                        <p>{!! $products['intro'] !!}</p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix" method="post">
                        <div class="cart-btn d-flex mb-50">
                            <p>Qty</p>
                            <div class="quantity">
                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                        </div>

                        <button type="submit" name="addtocart" value="5" class="btn amado-btn" onclick="var effect = document.getElementById('qty'); var qty = effect.value; buyShopCart('{!! csrf_token() !!}', '{!! $products['id'] !!}', qty); return false;">Add to cart</button>
                        <!-- <a name="addtocart" value="5" class="btn amado-btn" href="{!! URL('buy-product', [$item['id'], $item['alias']]) !!}">Add to cart</a> -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details Area End -->
@endsection