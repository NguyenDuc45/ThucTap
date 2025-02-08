@extends('layouts.main')

@section('content')
    <form action="{{ route('sanphams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="ten_san_pham">
        </div>
        <div class="mb-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="number" class="form-control" name="gia_san_pham">
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <input type="text" class="form-control" name="mo_ta">
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
@endsection
