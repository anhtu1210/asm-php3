<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
{
    const PAHT_VIEW = 'admin.order.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Order::STATUS_ORDER;
        $orders = Order::query()->latest('id')->get();
        return view(self::PAHT_VIEW . __FUNCTION__, compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        // Cập nhật trạng thái đơn hàng
        $order->status_order = $request->input('status_order');
        $order->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);

        $pdf = Pdf::loadView('admin.order.invoice', compact('order'));
        return $pdf->download('admin.order.invoice.pdf');
    }
}
