<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\AdminPhoto;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $status = 0;
        if($request->has('status')){
            $status = $request->status;
        }

        $dateFrom = '';
        if($request->has('dateFrom')){
            $dateFrom = $request->dateFrom;
        }

        $dateTo = '';
        if($request->has('dateTo')){
            $dateTo = $request->dateTo;
        }

        $user = Auth::user();

        return view('admin.home', array('user' => $user, 'status' => $status, 'dateFrom' => $dateFrom, 'dateTo' => $dateTo));
    }

    public function getData(Request $request){
        if(!$request->has('status') || $request->status == '0'){
            $status = '0';
        } else{
            $status = '1';
        }

        if(!$request->has('dateFrom') || $request->dateFrom == ''){
            $dateFrom = '1990-01-01';
        } else{
            $dateFrom = $request->dateFrom;
        }

        if(!$request->has('dateTo') || $request->dateTo == ''){
            $dateTo = date("Y-m-d", strtotime('tomorrow'));
        } else{
            $dateTo = $request->dateTo;
        }

        $data = AdminPhoto::select(['id', 'shop_name', 'name', 'total', 'description', 'status', 'created_at'])->where('status', $status)->orderBy('created_at', 'desc')->whereBetween('created_at', [$dateFrom, $dateTo])->get();

        return Datatables::of($data)->make();
    }

    public function insertData(Request $request){
        $user = Auth::user();

        return view('admin.insert-data', array('user' => $user));

    }

    public function insertDataProcess(Request $request){
        $photo = new AdminPhoto;
        $photo->shop_name = $request->shopName;
        $photo->name = $request->shopStuff;
        $photo->total = $request->shopTotal;
        $photo->description = $request->shopDescription;
        $photo->save();

        return redirect('admin')->with('success', 'Sukses menyimpan data');
    }

    public function editDataProcess(Request $request){
        if($request->has('shopId')){
            $photo = AdminPhoto::find($request->shopId);
            $photo->shop_name = $request->shopName;
            $photo->name = $request->shopStuff;
            $photo->total = $request->shopTotal;
            $photo->description = $request->shopDescription;
            $photo->save();

            return redirect('admin')->with('success', 'Sukses mengubah data');
        } else{
            return redirect('admin')->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function deleteDataProcess(Request $request){
        if($request->has('shopId')){
            $photo = AdminPhoto::find($request->shopId);

            $photo->delete();

            return redirect('admin')->with('success', 'Sukses menghapus data');
        } else{
            return redirect('admin')->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function checkDataProcess(Request $request){
        if($request->id){
            $photo = AdminPhoto::find($request->id);
            $photo->status = '1';
            $photo->save();

            return redirect('admin')->with('success', 'Sukses menandai selesai');
        } else{
            return redirect('admin')->with('error', 'Terjadi kesalahan sistem');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
