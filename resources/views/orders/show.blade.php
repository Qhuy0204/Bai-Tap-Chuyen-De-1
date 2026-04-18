@extends('layout')

@section('content')

<h3>Chi tiết đơn hàng</h3>

<p><b>Khách:</b> {{ $order->customer_name }}</p>
<p><b>Tổng tiền:</b> {{ $order->total }}</p>

<table class="table table-bordered">
<tr>
<th>Sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>
</tr>

@foreach($order->items as $item)
<tr>
<td>{{ $item->product_name }}</td>
<td>{{ $item->price }}</td>
<td>{{ $item->quantity }}</td>
<td>{{ $item->price * $item->quantity }}</td>
</tr>
@endforeach

</table>

<a href="/orders" class="btn btn-secondary">Quay lại</a>

@endsection