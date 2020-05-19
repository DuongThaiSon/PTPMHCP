@extends('admin.layouts.main')
@section('title','Thành phố')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body overflow-x-scroll">
        <table id="datatable" class="mb-0 table table-hover white-space-nowrap">
            <thead>
                <tr>
                    <th width="7%">ID</th>
                    <th width="7%">ID Thành Phố</th>
                    <th>Tên Thành Phố</th>
                    <th width="5%">Hành động</th>
                </tr>
            </thead>
            <tbody>
            @foreach($city as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->city_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td class="text-center">
                        <div class="btn-group-md btn-group btn-group-toggle">
                            <!-- <a class="btn btn-success btn-watch" href="/admin/weather-hourly" title="Xem Chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="" title="Sửa">
                                <i class="fas fa-edit color-white"></i>
                            </a> -->
                            <a class="btn btn-danger btn-delete" href="" title="Xóa">
                                <i class="pe-7s-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>
</div>
@endsection
