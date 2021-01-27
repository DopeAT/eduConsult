<div class="row align-items-center mb-3">
    <div class="col-8">
        <h3 class="mb-0">My account</h3>
    </div>
    <div class="col-4 text-right">
        <span class="btn btn-sm btn-success">Save Changes</span>
    </div>
</div>

<h6 class="heading-small text-muted mb-4">Orders information</h6>

<div class="row">
    <div class="col-sm-12">

        <div class="table-responsive">

            <table id="datatable" class="table w-100">
                <thead>
                <tr>
                    <th>Reference</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Ordered</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->orders as $order)
                    <tr>
                        <td class="font-weight-bold text-primary">
                            {{ $order->payment_id }}
                        </td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->payment->amount }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>
</div>