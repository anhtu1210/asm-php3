<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function save()
    {
        try {
            DB::transaction(function () {
                if (!Auth::check()) {
                    $password = empty(\request('password')) ? bcrypt(\request('user_email')) : \request('password');
                    $user = User::query()->create([
                        'name' => \request('user_name'),
                        'email' => \request('user_email'),
                        'address' => \request('user_address'),
                        'phone' => \request('user_phone'),
                        'password' => $password,
                        'is_active' => empty(\request('password')) ? false : true,
                    ]);
                } else {
                    $user = Auth::user();
                }


                $totalAmount = 0;
                $dataItem = [];
                foreach (session('cart') as $variantID => $item) {
                    $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);

                    $dataItem[] = [
                        'product_variant_id' => $variantID,
                        'quatity' => $item['quantity'],
                        'product_name' => $item['name'],
                        'product_sku' => $item['sku'],
                        'product_img_thumbnail' => $item['img_thumbnail'],
                        'product_price_regular' => $item['price_regular'],
                        'product_price_sale' => $item['price_sale'],
                        'variant_size_name' => $item['size']['name'],
                        'variant_color_name' => $item['color']['name'],
                    ];
                }

                $order = Order::query()->create([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'user_note' => \request('user_note'),
                    'user_phone' => \request('user_phone'),
                    'user_address' => \request('user_address'),
                    'total_price' => request()->total_price,
                    'promotion_id ' => \request('coupon'),
                ]);

                foreach ($dataItem as $item) {
                    $item['order_id'] = $order->id;

                    OrderItem::query()->create($item);
                }
            });

            session()->forget('cart');
            session()->forget(['coupon_id', 'discount', 'coupon_code']);

            return redirect()->route('home')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
            return back()->with('error', 'Lỗi đặt hàng');
        }
        
        // dd(request()->all());
        if (request()->payment_type == 'cod') {
        }
        // else {

        // error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        // date_default_timezone_set('Asia/Ho_Chi_Minh');

        // $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = route('vnpay.callback');
        // $vnp_TmnCode = "EABPVQE7"; //Mã website tại VNPAY
        // $vnp_HashSecret = "404O5TK0UHW54Z10XYTN8C7VTX2F3AGR"; //Chuỗi bí mật

        // $vnp_TxnRef = rand(00, 9999);
        // $vnp_OrderInfo = "Nội dung thanh toán";
        // $vnp_OrderType = "billpayment";
        // $vnp_Amount = request()->total_price * 100;
        // $vnp_Locale = "vn";
        // $vnp_BankCode = "NCB";
        // $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        // $inputData = array(
        //     "vnp_Version" => "2.1.0",
        //     "vnp_TmnCode" => $vnp_TmnCode,
        //     "vnp_Amount" => $vnp_Amount,
        //     "vnp_Command" => "pay",
        //     "vnp_CreateDate" => date('YmdHis'),
        //     "vnp_CurrCode" => "VND",
        //     "vnp_IpAddr" => $vnp_IpAddr,
        //     "vnp_Locale" => $vnp_Locale,
        //     "vnp_OrderInfo" => $vnp_OrderInfo,
        //     "vnp_OrderType" => $vnp_OrderType,
        //     "vnp_ReturnUrl" => $vnp_Returnurl,
        //     "vnp_TxnRef" => $vnp_TxnRef,
        // );

        // if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        //     $inputData['vnp_BankCode'] = $vnp_BankCode;
        // }

        // ksort($inputData);
        // $query = "";
        // $i = 0;
        // $hashdata = "";
        // foreach ($inputData as $key => $value) {
        //     if ($i == 1) {
        //         $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        //     } else {
        //         $hashdata .= urlencode($key) . "=" . urlencode($value);
        //         $i = 1;
        //     }
        //     $query .= urlencode($key) . "=" . urlencode($value) . '&';
        // }

        // $vnp_Url = $vnp_Url . "?" . $query;
        // if (isset($vnp_HashSecret)) {
        //     $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        // }
        // $data = [
        //     'name' => request()->user_name,
        //     'user_address' => request()->user_address,
        //     'user_email' => request()->user_email,
        //     'user_phone' => request()->user_phone,
        // ];
        // session(['checkout_data' => $data]);

        // return redirect()->away($vnp_Url);
        // }
    }


    public function showOrder(){
        
        return view('client.order.myOrder');
    }

    // public function vnpayCallback(Request $request)
    // {

    //     $vnp_HashSecret = "IAE2QHSH5HFIB90RQ7X9NLBQAWIR3HL0"; //Chuỗi bí mật

    //     $inputData = array();
    //     foreach ($request->all() as $key => $value) {
    //         if (substr($key, 0, 4) == "vnp_") {
    //             $inputData[$key] = $value;
    //         }
    //     }
    //     $vnp_SecureHash = $inputData['vnp_SecureHash'];
    //     unset($inputData['vnp_SecureHash']);
    //     ksort($inputData);
    //     $hashData = "";
    //     foreach ($inputData as $key => $value) {
    //         $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
    //     }
    //     $hashData = rtrim($hashData, '&');

    //     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    //     if ($secureHash == $vnp_SecureHash) {
    //         if ($inputData['vnp_ResponseCode'] == '00') {
    //             // Thanh toán thành công, cập nhật cơ sở dữ liệu
    //             try {
    //                 DB::beginTransaction();
    //                 // Lấy thông tin từ session hoặc request trước đó
    //                 $validated = session('checkout_data');
    //                 $carts = session()->get('cart');


    //                 $validated['status_payment'] = 'paid';
    //                 $validated['status_order'] = 'confirmed';

    //                 $order = User::find(Auth::user()->id)->orders()->create($validated);

    //                 $orderItems = $carts->map(function ($item) {
    //                     return [
    //                         'product_id' => $item->id,
    //                         'name' => $item->name,
    //                         'price' => $item->price,
    //                         'tax' => $item->tax,
    //                         'quantity' => $item->qty,
    //                     ];
    //                 })->toArray();

    //                 $order->details()->attach($orderItems);



    //                 DB::commit();

    //                 session()->flash('success', 'Đặt hàng thành công');
    //                 session()->forget('checkout_data');
    //                 return redirect()->route('thank-you');
    //             } catch (Exception $exception) {
    //                 DB::rollBack();
    //                 session()->flash('errors', $exception->getMessage());
    //                 return redirect()->route('checkout')->withErrors('Có lỗi xảy ra, vui lòng thử lại.');
    //             }
    //         } else {
    //             session()->flash('errors', 'Giao dịch thất bại');
    //             return redirect()->route('checkout')->withErrors('Giao dịch thất bại');
    //         }
    //     } else {
    //         session()->flash('errors', 'Chữ ký không hợp lệ');
    //         return redirect()->route('checkout')->withErrors('Chữ ký không hợp lệ');
    //     }
    // }
}
