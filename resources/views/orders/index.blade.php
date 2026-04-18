<table class="table table-bordered">
<tr>
    <th>Khách</th>
    <th>Tổng tiền</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
</tr>

@foreach($orders as $o)
<tr>
    <td>{{ $o->customer_name }}</td>
    <td>{{ $o->total }}</td>

    <td>
        @if($o->status == 'pending')
            <span class="badge bg-warning">pending</span>
        @elseif($o->status == 'processing')
            <span class="badge bg-primary">processing</span>
        @else
            <span class="badge bg-success">completed</span>
        @endif
    </td>

    <td>
        <!-- 🔥 LINK XEM CHI TIẾT -->
        <a href="/orders/{{ $o->id }}" class="btn btn-info btn-sm">Xem</a>
    </td>
</tr>
@endforeach

</table>

<table class="table table-bordered">
<tr>
<th>Khách</th>
<th>Tổng tiền</th>
<th>Trạng thái</th>
<th>Chi tiết</th>
</tr>

@foreach($orders as $o)
<tr>
<td>{{ $o->customer_name }}</td>
<td>{{ $o->total }}</td>

<td>
@if($o->status == 'pending')
<span class="badge bg-warning">pending</span>
@elseif($o->status == 'processing')
<span class="badge bg-primary">processing</span>
@else
<span class="badge bg-success">completed</span>
@endif
</td>

<td>
<a href="/orders/{{ $o->id }}" class="btn btn-info btn-sm">Xem</a>

<a href="/orders/status/{{ $o->id }}/processing" class="btn btn-primary btn-sm">Processing</a>
<a href="/orders/status/{{ $o->id }}/completed" class="btn btn-success btn-sm">Done</a>
</td>
</tr>
@endforeach

</table>

@endsection