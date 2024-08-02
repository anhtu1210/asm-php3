<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function list()
    {
        $cart = session('cart');
        $money_coupon = session('discount');
        // dd($cart);
        $tb = "";

        $totalAmount = 0;
        if (isset($cart)) {

            foreach ($cart as $item) {
                $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
            }
        } else {
            $tb = "<h2 style='color: #B18B5E' class='mb-4  '>Chưa có đơn hàng nào được thêm!</h2>";
        }
        if ($totalAmount != 0) {
            $money_tru = $totalAmount * $money_coupon / 100;
            $orderMoney = $totalAmount - $money_tru;
        }


        // dd($totalAmount);

        return view('client.shop.cart', compact('totalAmount', 'tb', 'orderMoney'));
    }

    public function add()
    {
        $product = Product::query()->findOrFail(\request('product_id'));
        $productVariant = ProductVariant::query()
            ->with(['color', 'size'])
            //            ->where('product_id', \request('product_id'))
            //            ->where('size_id', \request('size_id'))
            //            ->where('color_id', \request('color_id'))
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
            ])
            ->firstOrFail();
        // dd($productVariant->toArray());
        // dd(session('cart')[$productVariant->id]);
        if (!isset(session('cart')[$productVariant->id])) {
            $data = $product->toArray()
                + $productVariant->toArray()
                + ['quantity' => \request('quantity')];

            session()->put('cart.' . $productVariant->id,  $data);
        } else {
            $data = session('cart')[$productVariant->id];
            $data['quantity'] += \request('quantity');

            session()->put('cart.' . $productVariant->id,  $data);
        }

        return redirect()->route('cart.index');
    }

    public function updateCart(Request $request)
    {

        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            // session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }


    public function checkout()
    {
        $cart = session('cart');
        $money_coupon = session('discount');
        // dd($cart);
        $tb = "";

        $totalAmount = 0;
        if (isset($cart)) {

            foreach ($cart as $item) {
                $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
            }
        } else {
            $tb = "<h2 style='color: #B18B5E' class='mb-4  '>Chưa có đơn hàng nào được thêm!</h2>";
        }
        if ($totalAmount != 0) {
            $money_tru = $totalAmount * $money_coupon / 100;
            $orderMoney = $totalAmount - $money_tru;
        }
        // $user = null;
        if (Auth::user()) {
            $user = Auth::user();
            // dd($user->toArray());
        }
        return view('client.shop.checkout', compact('totalAmount', 'user' ? 'user' : '','orderMoney'));
    }

    public function discount(Request $request)
    {
        $name = $request->input('coupon_code');
        $money = Promotion::query()->where('title', '=', $name)->first();
        // dd($money);
        if ($money) {
            $message = "Áp mã giảm giá thành công";
            session()->put('coupon_id', $money->id);
            session()->put('discount', $money->discount);
            session()->put('coupon_code', $money->title);
        } else {
            session()->forget(['coupon_id', 'discount', 'coupon_code']);
            $message = "Mã giảm giá không tồn tại hoặc hết hạn";
        }
        return redirect()->route('cart.index')->with([
            'message' => $message
        ]);
    }
}
