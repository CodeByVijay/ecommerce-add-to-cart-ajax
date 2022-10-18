<?php

use App\Models\Cart;
use App\Models\Product; ?>
@extends('users.app')
@section('title', 'Home')
@section('contant')
<?php $products = Product::get();
$cart = Cart::where('user_id', auth()->user()->id)->count();
?>
<div class="container mt-5 mb-5">
    <div class="row">
        @forelse ($products as $product)
        <div class="col-md-6 col-sm-12 col-lg-4 d-flex align-items-stretch">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('product_images/'.$product->image)}}" alt="Card image cap" width="286" height="163">
                <div class="card-body">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <p class="card-text">{{$product->desc}}</p>
                    <?php $cartData = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->get(); ?>

                    <?php if ($cartData->count() != 0) {
                    ?>
                        <a href="#" class="btn btn-warning w-100">Go To Cart</a>
                    <?php
                    } else {
                    ?>
                        <a href="javascript:void(0)" class="btn btn-primary w-100 addToCart" data-userid="{{auth()->user()->id}}" data-pid="{{$product->id}}">Add To Cart</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        @empty
        <h3 class="text-center text-primary">No Product Found.</h3>
        @endforelse
    </div>
</div>

@endsection
@push('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.addToCart').on('click', function() {
            let pid = $(this).data('pid');
            let user_id = $(this).data('userid')
            let cartval = $('#cartVal')
            let btn = $(this)
            let cartRoute = `{{route('goToCart')}}`;

            $.ajax({
                type: "post",
                url: "{{route('addToCart')}}",
                data: {
                    "user_id": user_id,
                    'pid': pid
                },
                success: function(result) {
                    if (result.success == 'success') {
                        btn.removeClass('btn-primary');
                        btn.removeClass('addToCart');
                        btn.addClass('btn-warning')
                        btn.html('Go To Cart')
                        btn.data('userid',null)
                        btn.data('pid',null)
                        btn.attr('href',cartRoute)
                        cartval.html(result.qty)
                    }
                }
            });
        });
    });
</script>

@endpush