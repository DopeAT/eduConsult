<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>The ROPS - {{ $order->payment_id }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <style>
            /* -------------------------------------
                    GLOBAL A very basic CSS reset
            ------------------------------------- */
            * {
                margin: 0;
                padding: 0;
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                box-sizing: border-box;
                font-size: 14px;
            }

            img {
                max-width: 100%;
            }

            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
                line-height: 1.6;
            }

            /* Let's make sure all tables have defaults */
            table td {
                vertical-align: top;
            }

            /* -------------------------------------
                BODY & CONTAINER
            ------------------------------------- */
            body {
                background-color: #f6f6f6;
            }

            .body-wrap {
                background-color: #f6f6f6;
                width: 100%;
            }

            .container {
                display: block !important;
                max-width: 600px !important;
                margin: 0 auto !important;
                /* makes it centered */
                clear: both !important;
            }

            .content {
                max-width: 600px;
                margin: 0 auto;
                display: block;
                padding: 20px;
            }

            /* -------------------------------------
                HEADER, FOOTER, MAIN
            ------------------------------------- */
            .main {
                background: #fff;
                border: 1px solid #e9e9e9;
                border-radius: 3px;
            }

            .content-wrap {
                padding: 20px;
            }

            .content-block {
                padding: 0 0 20px;
            }

            .header {
                width: 100%;
                margin-bottom: 20px;
            }

            .footer {
                width: 100%;
                clear: both;
                color: #999;
                padding: 20px;
            }
            .footer a {
                color: #999;
            }
            .footer p, .footer a, .footer unsubscribe, .footer td {
                font-size: 12px;
            }

            /* -------------------------------------
                TYPOGRAPHY
            ------------------------------------- */
            h1, h2, h3 {
                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                color: #000;
                margin: 40px 0 0;
                line-height: 1.2;
                font-weight: 400;
            }

            h1 {
                font-size: 32px;
                font-weight: 500;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 18px;
            }

            h4 {
                font-size: 14px;
                font-weight: 600;
            }

            p, ul, ol {
                margin-bottom: 10px;
                font-weight: normal;
            }
            p li, ul li, ol li {
                margin-left: 5px;
                list-style-position: inside;
            }

            /* -------------------------------------
                LINKS & BUTTONS
            ------------------------------------- */
            a {
                color: #1ab394;
                text-decoration: underline;
            }

            .btn-primary {
                text-decoration: none;
                color: #FFF;
                background-color: #1ab394;
                border: solid #1ab394;
                border-width: 5px 10px;
                line-height: 2;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                display: inline-block;
                border-radius: 5px;
                text-transform: capitalize;
            }

            /* -------------------------------------
                OTHER STYLES THAT MIGHT BE USEFUL
            ------------------------------------- */
            .last {
                margin-bottom: 0;
            }

            .first {
                margin-top: 0;
            }

            .aligncenter {
                text-align: center;
            }

            .alignright {
                text-align: right;
            }

            .alignleft {
                text-align: left;
            }

            .clear {
                clear: both;
            }

            /* -------------------------------------
                ALERTS
                Change the class depending on warning email, good email or bad email
            ------------------------------------- */
            .alert {
                font-size: 16px;
                color: #fff;
                font-weight: 500;
                padding: 20px;
                text-align: center;
                border-radius: 3px 3px 0 0;
            }
            .alert a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
                font-size: 16px;
            }
            .alert.alert-warning {
                background: #f8ac59;
            }
            .alert.alert-bad {
                background: #ed5565;
            }
            .alert.alert-good {
                background: #1ab394;
            }

            /* -------------------------------------
                INVOICE
                Styles for the billing table
            ------------------------------------- */
            .invoice {
                margin: 40px auto;
                text-align: left;
                width: 80%;
            }
            .invoice td {
                padding: 5px 0;
            }
            .invoice .invoice-items {
                width: 100%;
            }
            .invoice .invoice-items td {
                border-top: #eee 1px solid;
            }
            .invoice .invoice-items .total td {
                border-top: 2px solid #333;
                border-bottom: 2px solid #333;
                font-weight: 700;
            }

            /* -------------------------------------
                RESPONSIVE AND MOBILE FRIENDLY STYLES
            ------------------------------------- */
            @media only screen and (max-width: 640px) {
                h1, h2, h3, h4 {
                    font-weight: 600 !important;
                    margin: 20px 0 5px !important;
                }

                h1 {
                    font-size: 22px !important;
                }

                h2 {
                    font-size: 18px !important;
                }

                h3 {
                    font-size: 16px !important;
                }

                .container {
                    width: 100% !important;
                }

                .content, .content-wrap {
                    padding: 10px !important;
                }

                .invoice {
                    width: 100% !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="container mainContainer">
            <div class="row">
                <div class="col-md-12">
                    <table class="body-wrap">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                                <td class="container">
                                    <div class="content">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-wrap aligncenter">
                                                        <table width="100%" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="content-block">
                                                                        <img src="{{ url('/images/app/logo/Original.svg') }}" width="115px">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="content-block">
                                                                        <table class="invoice">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        {{ $order->user->firstname }} {{ $order->user->lastname }}
                                                                                        <br>Invoice <b>#{{ $order->payment_id }}</b>
                                                                                        <br>{{ now()->format('d M Y') }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>{{ $order->service->name }}</td>
                                                                                                    <td class="alignright">&nbsp;</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>{{ $order->product->name }}</td>
                                                                                                    <td class="alignright">&nbsp;</td>
                                                                                                </tr>
                                                                                                @if($order->extra_services)
                                                                                                    @foreach($order->extra_services as $service)
                                                                                                        <tr>
                                                                                                            <td>{{ $service->name }}</td>
                                                                                                            <td class="alignright">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                                <tr class="total">
                                                                                                    <td class="alignright" width="80%">Total</td>
                                                                                                    <td class="alignright">
                                                                                                        £{{ $payment->amount }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            <tr>
                                                                <td class="content-block text-center">
                                                                    {{ env('COMPANY') }},
                                                                    {{ env('ADDRESS') }},
                                                                    {{ env('CITY') }}, {{ env('COUNTY') }},
                                                                    {{ env('POSTCODE') }}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="footer">
                                            <table width="100%">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center aligncenter content-block">
                                                        Questions? Email <a href="mailto:{{ env('INFO_EMAIL') }}">{{ env('INFO_EMAIL') }}</a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
