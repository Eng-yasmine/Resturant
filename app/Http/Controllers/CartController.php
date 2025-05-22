<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\MenuItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $cartItems = Cart::with('menuItem')->where('user_id', auth()->id())->get();
        return view('User.carts.index', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
    $validated = $request->validated();
    $userId = auth()->id();
    $validated['user_id'] = $userId;

    $menuItem = MenuItem::findOrFail($validated['menu_item_id']);
    $validated['price'] = $menuItem->price;

    // هل المنتج موجود في الكارت؟
    $existingCartItem = Cart::where('user_id', $userId)
                            ->where('menu_item_id', $validated['menu_item_id'])
                            ->first();

    if ($existingCartItem) {
        // لو موجود زود الكمية
        $existingCartItem->quantity += $validated['quantity'];
        $existingCartItem->save();
    } else {
        // لو مش موجود، أضف جديد
        Cart::create($validated);
    }

    return redirect()->route('carts.index')->with('success', 'Item added to cart successfully');
}



    public function increaseQuantity(Cart $cart)
    {
        $cart->quantity++ ;
        $cart->save();

          if (request()->ajax()) {
        return response()->json(['success' => true, 'quantity' => $cart->quantity]);
    // } else {
    //     return redirect()->back()->with('success','Quantity increased successfully.');
    }
}

    public function decreaseQuantity(Cart $cart)
    {

    if ($cart->quantity > 1) {
        $cart->quantity--;
        $cart->save();
    } else {

        $cart->delete();
        $cart->quantity = 0;
    }

     if (request()->ajax()) {
        return response()->json(['success' => true, 'quantity' => $cart->quantity]);
    }
    // return redirect()->back()->with('success', 'Quantity decreased successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //دي هعملها ليه
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
