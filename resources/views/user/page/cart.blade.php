@extends('user.master')
@section('description', 'ABC')
@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
        
        @if (count($cart_list) == 0)
        <p>empty</p>
        @else
        <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                    
                </div>
                <button onclick="updateShopCart('{!! csrf_token() !!}')">update</button>
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_list as $cart_item)
                            <tr>
                                <td class="cart_product_img">
                                    <a href="#"><img src="{!! '/images/'.$cart_item->options['image'] !!}" alt="Product"></a>
                                </td>
                                <td class="cart_product_desc">
                                    <h5>{!! $cart_item->name !!}</h5>
                                </td>
                                <td class="price">
                                    <button onclick="delShopCart('{!! csrf_token() !!}', '{!! $cart_item->rowId !!}')">xóa</button>
                                    <span>${!! number_format($cart_item->price,0,",",".") !!}</span>
                                </td>
                                <td class="qty">
                                    <div class="qty-btn d-flex">
                                        <p>Qty</p>
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = this.parentNode.querySelector('#qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="hidden" class="cart_rowid_input" value="{!! $cart_item->rowId!!}">
                                            <input type="hidden" class="cart_id_input" value="{!! $cart_item->id!!}">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{!! $cart_item->qty !!}">
                                            <span class="qty-plus" onclick="var effect = this.parentNode.querySelector('#qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span>${!! $cart_subtotal !!}</span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span>${!! $cart_total !!}</span></li>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="{!! URL('checkout') !!}" class="btn amado-btn w-100">Checkout Paypal </a>
                        <br />
                        <button onclick="createOrder('{!! csrf_token() !!}')" class="btn amado-btn w-100">Checkout Normal</button>
                    </div>
                </div>
            </div>
            
        @endif
        </div>
    </div>
</div>
@endsection