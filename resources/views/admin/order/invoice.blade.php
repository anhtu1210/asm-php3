<!-- resources/views/admin/orders/invoice.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
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

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h2>Hóa đơn</h2>
                            </td>

                            <td>
                                Hóa đơn #: {{ $order->id }}<br>
                                Ngày: {{ $order->created_at->format('d/m/Y') }}<br>
                                Hạn thanh toán: {{ $order->created_at->addDays(30)->format('d/m/Y') }}
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
                                Công ty Anh Tú<br>
                                Địa chỉ: Số 123, Đường ABC<br>
                                Thành phố, Quốc gia
                            </td>

                            <td>
                                {{ $order->user_name }}<br>
                                {{ $order->user_email }}<br>
                                {{ $order->user_address }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Sản phẩm</td>
                <td>Giá</td>
                <td>Số lượng</td>
            </tr>

            @foreach ($order->orderItems as $item)
                @php
                    $price = $item->product_price_sale == 0 ? $item->product_price_regular : $item->product_price_sale;
                @endphp
                <tr class="item">
                    <td>{{ $item->product_name }}</td>
                    <td>{{ number_format($price, 0, ',', '.') }} VND</td>
                    <td>{{ $item->quatity }}</td>
                </tr>
            @endforeach

            <tr class="total">
                <td></td>
                <td>Tổng: {{ number_format($order->total_price, 0, ',', '.') }} VND</td>
            </tr>
        </table>
    </div>
</body>

</html>
