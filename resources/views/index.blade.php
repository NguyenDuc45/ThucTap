@extends('layouts.main')

@section('content')
    <a href="{{ route('sanphams.create') }}" class="btn btn-primary">
        <i class="ri-add-circle-line align-middle me-1"></i>
        Thêm sản phẩm
    </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listSanPham as $index => $sanPham)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $sanPham->ten_san_pham }}</td>
                    <td>{{ $sanPham->gia_san_pham }}</td>
                    <td>{{ $sanPham->mo_ta }}</td>
                    <td>
                        <a href="{{ route('sanphams.edit', $sanPham->id) }}" class="btn btn-sm btn-warning">Sửa</a>

                        <form action="{{ route('sanphams.destroy', $sanPham->id) }}" method="post" class="d-inline"
                            onsubmit="return confirm('Xác nhận xóa?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
