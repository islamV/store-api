<?php

namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orders = Order::with('user')->get() ;
      return response()->json($orders , 200) ;
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            // Validate and gather data
            $data = $request->validated();
            // dd($data);
            $data['user_id'] = auth()->guard('api')->user()->id;
            $data['status'] = 'pending';


            // Create order
            $order = Order::create($data);

            // Create payment details
            $paymentData = $request->only(['fname', 'lname', 'phone', 'card_number', 'mm_yy', 'cvc']);
            $paymentData['order_id'] = $order->id ;
            $payment = new Payment($paymentData);

            if ($payment->save()) {
                return response()->json(['success' => 'Category created successfully'], 201);
            }else{
                return response()->json(['error' => 'Payment  failed'], 500);
            }



        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|integer',
        ]);
        Order::destroy($validated['id']);

        return response()->json(['success' => 'Products deleted successfully.']);
    }
}