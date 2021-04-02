<div class="card my-3 py-5">
    <div class="card-body">
        <h5>Order Details: #{{$order->payment_id}}</h5>
        <p class="fs--1">
            <i class="far fa-calendar-alt"></i> {{ $order->created_at->format('d F Y') }},
            <i class="fas fa-clock"></i> {{ $order->created_at->format('H:i:s') }}
        </p>
        <div><strong class="mr-2">Status: </strong>
            <div class="badge badge-pill badge-soft-success fs--2 text-capitalize">
                {{ $order->payment->payment_status }}
                @if($order->payment->payment_status === 'succeeded')
                    <span class="fas fa-check ml-1 text-success" data-fa-transform="shrink-2"></span>
                @else
                    <span class="fas fa-times ml-1 text-danger" data-fa-transform="shrink-2"></span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="mb-3 fs-0">Billing Info</h5>
                <h6 class="mb-2">{{$user->fullname()}}</h6>
                <p class="mb-0 fs--1"> <strong>Email: </strong><a href="mailto:ricky@gmail.com">{{$user->email}}</a></p>
                <p class="mb-0 fs--1"> <strong>Phone: </strong><a href="tel:7897987987">{{$user->phone}}</a></p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive fs--1">
            <table class="table table-striped border-bottom">
                <thead class="bg-200 text-900">
                <tr>
                    <th class="border-0">Products</th>
                    <th class="border-0 text-center"> </th>
                    <th class="border-0 text-right"> </th>
                    <th class="border-0 text-right">Amount</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">{{ $order->service->name }}</h6>
                        </td>
                        <td class="align-middle text-center"> </td>
                        <td class="align-middle text-right"> </td>
                        <td class="align-middle text-right"> </td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">{{ $order->product->name }}</h6>
                        </td>
                        <td class="align-middle text-center"> </td>
                        <td class="align-middle text-right"> </td>
                        <td class="align-middle text-right"> </td>
                    </tr>
                    @if($extraServices)
                        @foreach($extraServices as $service)

                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $service->name }}</h6>
                                </td>
                                <td class="align-middle text-center"> </td>
                                <td class="align-middle text-right"> </td>
                                <td class="align-middle text-right"> </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="row no-gutters justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-right">
                    <tbody>
                        <tr>
                            <th class="text-900">Total:</th>
                            <td class="font-weight-semi-bold">£{{ $payment->amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
