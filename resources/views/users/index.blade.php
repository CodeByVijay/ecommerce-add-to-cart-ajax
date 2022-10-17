<?php use App\Models\Product; ?>
@extends('users.app')
@section('title', 'Home')
@section('contant')
    <?php $products = Product::get(); ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-6 col-sm-12 col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('product_images/'.$product->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            @empty
                <h3 class="text-center text-primary">No Product Found.</h3>
            @endforelse
        </div>
    </div>

@endsection
