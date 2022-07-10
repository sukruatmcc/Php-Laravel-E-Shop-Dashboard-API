<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Http\Requests\StoreCuponRequest;
use App\Http\Requests\UpdateCuponRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cupon_list()
    {
      $cupons = Cupon::paginate(10);
      return view('admin.include.cupon',compact('cupons'));
    }

    public function cuponAdd()
    {
      return view('admin.include.cupon_add');
    }

    public function cuponsEdit($id)
    {
      $cupons = Cupon::find($id);
      return view('admin.include.cupons_update',compact('cupons'));
    }

    public function cuponsEditPost(Request $request,$id)
    {
      Cupon::find($id)->update([
        'cupon_name' => $request->cupon_name,
        'cupon_slug' => $request->cupon_slug,
        'status' => $request->status == TRUE ? '1':'0',
        'created_at' => Carbon::now(),
      ]);
      return redirect()->route('cupon.mng')->with('success',$request->cupon_name.' Updated Cupon');
    }


    public function cuponAddPost(Request $request)
    {
      $request->validate([
     'cupon_name' => 'required|min:3|max:20|',
     'cupon_slug' => 'required|min:3|max:25',
 ]);
    Cupon::insert([
     'cupon_name' => $request->cupon_name,
     'discount' => $request->discount,
     'cupon_slug' => $request->cupon_slug,
     'status' => $request->status == TRUE ? '1':'0',
     'created_at' => Carbon::now(),
   ]);
    return redirect()->route('cupon.mng')->with('success','Added New Cupon');
    }

    public function cuponDelete($id)
    {
      Cupon::find($id)->delete();
      return redirect()->route('cupon.mng')->with('success','Deleted Cupon');
    }

    public function active($id)
    {
      Cupon::find($id)->update([
        'status' => '0',
      ]);
      return redirect()->back()->with('success','Status InActive');
    }

    public function inactive($id)
    {
      Cupon::find($id)->update([
        'status' => '1',
      ]);
      return redirect()->back()->with('success','Status Active');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCuponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuponRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupon $cupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCuponRequest  $request
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCuponRequest $request, Cupon $cupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        //
    }
}
