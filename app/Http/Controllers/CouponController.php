<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Exception;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admins.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       try{
             Coupon::create([
                "coupon_code" => $request->coupon_code,
                "coupon_type" => $request->coupon_type,
                "amount" => $request->amount,
                "start_at" => $request->start_at,
                "expired_at" => $request->expired_at,
            ]);
            parent::successMessage('Coupon saved successfully.');
            return redirect(route('coupon-code.index'));
        } catch(Exception $e) {
            parent::dangerMessage("Coupon Does Not Created, Please Try  Again");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admins.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try{
            $coupon = Coupon::find($id);
            $coupon->update([
                "coupon_code" => $request->coupon_code,
                "coupon_type" => $request->coupon_type,
                "amount" => $request->amount,
                "count" => $request->count,
                "start_at" => $request->start_at,
                "expired_at" => $request->expired_at,
            ]);
            parent::successMessage('Coupon updated successfully.');
            return redirect(route('coupon-code.index'));
        } catch(Exception $e) {
            dd($e->getMessage());
            parent::dangerMessage("Coupon Does Not Updated, Please Try  Again");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $coupon = Coupon::find($id);
            $coupon->delete();
            parent::successMessage('Coupon deleted successfully.');
            return redirect(route('coupon-code.index'));
        } catch(Exception $e) {
            dd($e->getMessage());
            parent::dangerMessage("Coupon Does Not Deleted, Please Try  Again");
            return redirect()->back();
        }
    }
}
