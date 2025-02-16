<?php

namespace App\Http\Controllers;

use App\Http\Resources\SanPhamResource;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ApiSanPhamController extends Controller
{
    protected $sanPham;

    public function __construct()
    {
        $this->sanPham = new SanPham();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanPham = SanPham::all();
        return SanPhamResource::collection($sanPham);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->sanPham->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sanPham = $this->sanPham->find($id);
        $sanPham->update($request->all());
        return $sanPham;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = $this->sanPham->find($id);
        return $sanPham->delete();
    }
}
