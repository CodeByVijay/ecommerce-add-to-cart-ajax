<?php
use App\Models\Product;
?>
@extends('partials.app')
@section('title', 'Dashboard')
@section('main-containt')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                {{-- <div class="col-md-7 align-self-center">
                <a href="https://www.wrappixel.com/templates/adminwrap/"
                    class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Upgrade to
                    Pro</a>
            </div> --}}
            </div>
        <?php $product = Product::get(); ?>
            <div class="row">
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="text-center">Total Products</h2>
                            <h4 class="text-center text-primary">{{$product->count()}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->



        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © {{ date('Y') }} Design by Vijay Amule <a href="#">vijayamule.in</a> </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@endsection
