@extends('users.app')
@section('title', 'Cart')
@section('contant')

<div class="container mt-5 mb-5">
    <table class="table table-striped table-hover" id="ptable">
        <thead>
            <tr>
                <th>SN</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($products as $product)
            <tr>
                <td>{{$i++}}</td>
                <td><img src="{{asset('product_images/'.$product->image)}}" width="100" height="50"></td>
                <td>{{$product->product_name}}</td>
                <td><input type="number" name="qty" class="qty" value="{{$product->qty}}" min="1" style="border: none; width:80px"></td>
                <td>
                    <a href="{{route('deleteCart',['cartid'=>$product->cart_id])}}" class="btn btn-danger" onclick="return confirm('Are You Sure Delete This Product.')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

            @endforeach


        </tbody>
    </table>

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

    });
</script>

@endpush
@push('script')
    <script>
        $(document).ready(function() {
            $('#ptable').DataTable();
        });
    </script>
@endpush