<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderDetailRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreOrderRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function trcking_order(Order $order)
    {
        $order = Order::FindOrFail($order->id);
        return view('User.orders.track',compact('order'));
    }

  public function confirm_order(Request $request)
{
    $user_id = auth()->id();
    $cart = Cart::with('menuItem')->where('user_id', $user_id)->get();

    if ($cart->isEmpty()) {
        return redirect()->route('cart.checkout')->withErrors('No items in cart.');
    }

    DB::beginTransaction();

    try {
        $order = Order::create([
            'user_id' => $user_id,
            'total_price' => $cart->sum(fn($item) => $item->price * $item->quantity),
            'status' => 'pending',
        ]);

        foreach ($cart as $cartItem) {
            $menuItem = $cartItem->menuItem;
            OrderDetail::create([
                'order_id' => $order->id,
                'name' => $menuItem->name,
                'price' => $menuItem->price,
                'menu_item_id'=> $menuItem->id,
                'quantity' => $cartItem->quantity,
                'quantity_price' => $menuItem->price * $cartItem->quantity,
            ]);
        }
\Log::info('Cart items count before delete: ' . $cart->count());

        Cart::where('user_id', $user_id)->delete();

        DB::commit();

        return redirect()->route('order.confirm.show', $order->id)
                    ->with('success', 'Your order has been placed successfully.');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cart.checkout')->withErrors($e->getMessage());
    }
}


public function showConfirmation(Order $order)
{
$order = $order->load('order_details.menuItem');

return view('User.orders.ShowConfirmation', compact('order'));
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
