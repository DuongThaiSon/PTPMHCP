@extends('admin.layouts.main')
@section('title','Thời tiết hàng giờ')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body overflow-x-scroll">
        <table id="datatable" class="mb-0 table table-hover white-space-nowrap">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên TP</th>
                    <th>Thời gian</th>
                    <th>Độ ẩm TB</th>
                    <th>Tốc độ gió TB</th>
                    <th>Tầm nhìn xa</th>
                    <th>Mực nước biển TB</th>
                    <th>Thời điểm</th>
                    <th>Áp suất TB</th>
                    <th>Điểm sương TB</th>
                    <th>Lượng tuyết</th>
                    <th>Hướng gió TB</th>
                    <th>Nhiệt độ</th>
                    <th>Nhiệt độ TB</th>
                    <th>Lượng mưa tích lũy</th>
                    <th>Lượng mây TB</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group-md btn-group btn-group-toggle">
                            <a class="btn btn-success btn-watch" href="/admin/weather-hourly" title="Xem Chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- <a class="btn btn-primary" href="" title="Sửa">
                                <i class="fas fa-edit color-white"></i>
                            </a> -->
                            <a class="btn btn-danger btn-delete" href="" title="Xóa">
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
