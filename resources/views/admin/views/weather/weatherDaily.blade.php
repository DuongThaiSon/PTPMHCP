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
            <a href="https://drive.google.com/file/d/15LGF1sendXbmFp-XSG1xrjcC1CVQHH9e/view?usp=sharing" title="Dữ liệu">
                <div class="page-title-icon">
                    <i class="pe-7s-info icon-gradient bg-happy-itmeo"></i>
                </div>
            </a>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title color-dark">Thêm thông tin thời tiết</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updateWeather') }}" class="">
                                <div class="form-group">
                                    <label for="" class="color-dark">ID Thành Phố</label>
                                    <input type="text" name="city_id" class="form-control" required>
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
                    <th>Hành động</th>
                    <th>Tên TP</th>
                    <th>ID</th>
                    <th class="text-center">ID TP</th>
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
                    <th>Lượng mưa TL</th>
                    <th>Hướng gió TB</th>
                    <th>Nhiệt độ max</th>
                    <th>Nhiệt độ min</th>
                    <th>Hướng gió max</th>
                    <th>Lượng tuyết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weather_daily as $row)
                <tr>
                    <td>
                        <div class="btn-group-md btn-group btn-group-toggle">
                            <a class="btn btn-success btn-watch"
                                href="/admin/weather-hourly/{{$row->city_id}}/{{$row->id}}" title="Xem Chi tiết">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-primary" href="{{route('get-edit-daily',$row->id)}}" title="Sửa">
                                <i class="fas fa-edit color-white"></i>
                            </a>
                        </div>
                    </td>
                    <td>{{ $row->cityname }}</td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->city_id }}</td>
                    <td>{{ $row->datetime }}</td>
                    <td class="text-center">{{ $row->rh }}</td>
                    <td class="text-center">{{ $row->max_wind_spd }}</td>
                    <td class="text-center">{{ $row->wind_gust_spd }}</td>
                    <td class="text-center">{{ $row->clouds }}</td>
                    <td class="text-center">{{ $row->precip_gpm }}</td>
                    <td class="text-center">{{ $row->wind_spd }}</td>
                    <td class="text-center">{{ $row->slp }}</td>
                    <td class="text-center">{{ $row->temp }}</td>
                    <td class="text-center">{{ $row->pres }}</td>
                    <td class="text-center">{{ $row->dewpt }}</td>
                    <td class="text-center">{{ $row->precip }}</td>
                    <td class="text-center">{{ $row->wind_dir }}</td>
                    <td class="text-center">{{ $row->max_temp }}</td>
                    <td class="text-center">{{ $row->min_temp }}</td>
                    <td class="text-center">{{ $row->max_wind_dir }}</td>
                    <td class="text-center">{{ $row->snow }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
