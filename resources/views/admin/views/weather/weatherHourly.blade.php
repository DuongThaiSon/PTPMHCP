@extends('admin.layouts.main')
@section('title','Thời tiết hàng giờ')
@section('content')
<div class="main-card mb-3 card">
    <div class="card-body overflow-x-scroll">
        <table id="datatable" class="mb-0 table table-hover white-space-nowrap">
            <thead>
                <tr>
                    <th>Hành động</th>
                    <th class="text-center">Tên TP</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Thời gian</th>
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
                    <th>Lượng mưa TL</th>
                    <th>Lượng mây TB</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weather_hourly as $row)
                <tr>
                    <td>
                        <div class="btn-group-md btn-group btn-group-toggle">
                            <a class="btn btn-primary" href="{{route('get-edit-hourly',$row->hourly_id)}}" title="Sửa">
                                <i class="fas fa-edit color-white"></i>
                            </a>
                            <a class="btn btn-danger btn-delete" href="javascript:void(0)" title="Xóa" data1="{{$row->hourly_id}}">
                                <i class="pe-7s-trash"></i>
                            </a>
                        </div>
                    </td>
                    <td>{{$row->cityname}}</td>
                    <td>{{$row->hourly_id}}</td>
                    <td>{{ $row->datetime }}</td>
                    <td class="text-center">{{ $row->rh }}</td>
                    <td class="text-center">{{ $row->wind_spd }}</td>
                    <td class="text-center">{{ $row->vis }}</td>
                    <td class="text-center">{{ $row->slp }}</td>
                    <td class="text-center">{{ $row->pod == "d"  ? 'Ngày' : 'Đêm' }}</td>
                    <td class="text-center">{{ $row->pres }}</td>
                    <td class="text-center">{{ $row->dewpt }}</td>
                    <td class="text-center">{{ $row->snow }}</td>
                    <td class="text-center">{{ $row->wind_dir }}</td>
                    <td class="text-center">{{ $row->app_temp }}</td>
                    <td class="text-center">{{ $row->temp }}</td>
                    <td class="text-center">{{ $row->precip }}</td>
                    <td class="text-center">{{ $row->clouds }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $('.btn-delete').click(function () {
        if(confirm("Bạn có muốn xóa không ?")){
            var focus = $(this).closest('tr');
            $.post("/admin/deleteweatherhourly/"+$(this).attr('data1'),{"_token": "{{ csrf_token() }}"},function(data){
                $(focus).remove();
                console.log(data);
                alert("Xóa thành công");
            })
        }
    });
</script>
@endsection
