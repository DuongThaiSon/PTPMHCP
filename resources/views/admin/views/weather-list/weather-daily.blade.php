@extends('admin.layouts.main')
@section('title','Thời tiết hàng ngày')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <a href="javascript:void(0)" title="Thêm mới" data-toggle="modal" data-target="#myModal">
                <div class="page-title-icon">
                    <i class="pe-7s-plus icon-gradient bg-happy-itmeo"></i>
                </div>
            </a>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm thông tin thời tiết</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="">
                                <div class="form-group">
                                    <label for="">ID Thành Phố</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mx-auto">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body overflow-x-scroll">
        <table id="datatable" class="mb-0 table table-hover white-space-nowrap">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Thời gian</th>
                    <th>Độ ẩm TB</th>
                    <th>Tốc độ gió max</th>
                    <th>Tốc độ gió mạnh</th>
                    <th>Lượng mây TB</th>
                    <th>Lượng mưa TB</th>
                    <th>Tốc độ gió TB</th>
                    <th>Mực nước biển TB</th>
                    <th>Nhiệt độ TB</th>
                    <th>Áp suất TB</th>
                    <th>Điểm sương TB</th>
                    <th>Lượng mưa tích lũy</th>
                    <th>Hướng gió TB</th>
                    <th>Nhiệt độ max</th>
                    <th>Nhiệt độ min</th>
                    <th>Hướng gió max</th>
                    <th>Lượng tuyết</th>
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
