@extends('users.app')
@section('title', 'Cart')
@section('contant')

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center text-primary">Cart</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="ptable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $product)
                            <tr id="cartRow{{ $product->cart_id }}">
                                <td>{{ $i++ }}</td>
                                <td><img src="{{ asset('product_images/' . $product->image) }}" width="100" height="50">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td><input type="number" name="qty" class="qty" value="{{ $product->qty }}"
                                        min="1" style="border: none; width:80px"
                                        data-cart_id="{{ $product->cart_id }}" data-pid="{{ $product->product_id }}"></td>
                                <td>&#8377; <span id="productPrice{{ $product->cart_id }}">{{ $product->price }}</span></td>
                                <td>
                                    <a href="{{ route('deleteCart', ['cartid' => $product->cart_id]) }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are You Sure Delete This Product.')"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
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
            $('.qty').on('change', function() {
                let qty = $(this).val();
                let cart_id = $(this).data('cart_id');
                let pid = $(this).data('pid');

                if (qty !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{ route('cartIncrement') }}",
                        data: {
                            "qty": qty,
                            'cart_id': cart_id,
                            "pid": pid
                        },
                        success: function(result) {
                            // console.log(result.price)
                            $(`#productPrice${cart_id}`).html(result.price)
                        }
                    });
                }

            })
        });

        $(document).ready(function() {
            $('.qty').on('keyup', function() {
                let qty = $(this).val();
                let cart_id = $(this).data('cart_id');
                let pid = $(this).data('pid');

                if (qty !== "") {
                    $.ajax({
                        type: "post",
                        url: "{{ route('cartIncrement') }}",
                        data: {
                            "qty": qty,
                            'cart_id': cart_id,
                            "pid": pid
                        },
                        success: function(result) {
                            // console.log(result.success)
                            if (result.success === "Cart Delete") {
                                $(`#cartRow${cart_id}`).fadeOut(800);
                                setTimeout(() => {
                                    location.reload()
                                }, 1000);
                            }
                            $(`#productPrice${cart_id}`).html(result.price)
                        }
                    });
                }

            })
        });


        $(document).ready(function() {
            $('#ptable').DataTable();
        });
    </script>
@endpush
