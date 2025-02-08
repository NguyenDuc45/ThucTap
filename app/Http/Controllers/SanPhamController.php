<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listSanPham = DB::table("san_phams")->get();
        return view("index", compact("listSanPham"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                "ten_san_pham" => $request->input("ten_san_pham"),
                "gia_san_pham" => $request->input("gia_san_pham"),
                "mo_ta" => $request->input("mo_ta"),
            ];

            DB::table('san_phams')->insert($data);
            DB::commit();

            return redirect()->route("sanphams.index");
        } catch (\PDOException $e) {
            DB::rollBack();
            return redirect()->route("sanphams.index");
        }
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
        $sanPham = DB::table("san_phams")->find($id);

        if (!$sanPham) {
            return redirect()->route("sanphams.index");
        }

        return view("edit", compact("sanPham"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();
        try {
            $sanPham = DB::table("san_phams")->find($id);

            if (!$sanPham) {
                return redirect()->route("sanphams.index");
            }

            $data = [
                "ten_san_pham" => $request->input("ten_san_pham"),
                "gia_san_pham" => $request->input("gia_san_pham"),
                "mo_ta" => $request->input("mo_ta"),
                "updated_at" => now()
            ];

            DB::table("san_phams")->where("id", $id)->update($data);
            DB::commit();

            return redirect()->route("sanphams.index");
        } catch (\PDOException $e) {
            DB::rollBack();
            return redirect()->route("sanphams.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = DB::table("san_phams")->find($id);

        if (!$sanPham) {
            return redirect()->route("sanphams.index");
        }

        DB::table("san_phams")->where("id", $id)->delete();
        return redirect()->route("sanphams.index");
    }
}
