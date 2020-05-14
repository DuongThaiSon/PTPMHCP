@extends('admin.layouts.main')
@section('title','Thời tiết hàng giờ')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <table class="mb-0 table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width="10%">Tên</th>
                        <th width="10%">Ảnh</th>
                        <th width="30%">Mô tả</th>
                        <th width="11%">Giá tiền</th>
                        <th>Size</th>
                        <th>Danh Mục</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <img src="" alt="" width="100">
                        </td>
                        <td>
                            <p></p>
                        </td>
                        <td>
                            <span></span>
                            <span>/</span>
                            <span></span>
                        </td>
                        <td>
                            <span>M</span>
                            <span>/</span>
                            <span>L</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="btn-group-md btn-group btn-group-toggle">
                                <a class="btn btn-primary" href="" title="Sửa">
                                    <i class="fas fa-edit color-white"></i>
                                </a>
                                <a class="btn btn-danger btn-delete"  href="" title="Xóa">
                                    <i class="pe-7s-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection