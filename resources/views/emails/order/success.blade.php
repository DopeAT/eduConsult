<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1.0" />
    <title>The ROPS - Order Confirmation Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                        </td>

                        <td>
                            Invoice #: {{ $order->payment_id }}<br>
                            Created:  {{ date('d-M-Y h:i:sa') }}<br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{ env('COMPANY') }}<br>
                            {{ env('ADDRESS') }}, {{ env('POSTCODE') }}<br>
                            {{ env('CITY') }}, {{ env('COUNTY') }}<br>
                            {{ env('COUNTRY') }}
                        </td>

                        <td>
                            {{ $payer->name }}<br>
                            {{ $payer->email }}<br>
                            {{ $payer->phone }}<br>
                            {{ $payer->postcode }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Item
            </td>

            <td>
                Price
            </td>
        </tr>

        <tr class="item">
            <td>{{ $order->service->name }}</td>
            <td> </td>
        </tr>

        <tr class="item">
            <td>{{ $order->product->name }}</td>
            <td> </td>
        </tr>
        @if($order->extra_services)
            @foreach($order->extra_services as $service)
                <tr class="item">
                    <td>{{ $service->name }}</td>
                    <td>&nbsp;</td>
                </tr>
            @endforeach
        @endif

        <tr class="total">
            <td style="border-top: 1px solid #000;font-weight: 700;">Total</td>

            <td style="border-top: 1px solid #000;font-weight: 700;">
                £{{ $payment->amount }}
            </td>
        </tr>
    </table>
</div>
</body>
</html>
