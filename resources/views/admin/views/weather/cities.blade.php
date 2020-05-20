@extends('admin.layouts.main')
@section('title','Thành phố')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <a href="/update-city" title="Làm mới">
                <div class="page-title-icon">
                    <i class="pe-7s-plus icon-gradient bg-happy-itmeo"></i>
                </div>
            </a>
            <a href="https://drive.google.com/file/d/15LGF1sendXbmFp-XSG1xrjcC1CVQHH9e/view?usp=sharing" title="Dữ liệu">
                <div class="page-title-icon">
                    <i class="pe-7s-info icon-gradient bg-happy-itmeo"></i>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body overflow-x-scroll">
        <table id="datatable" class="mb-0 table table-hover white-space-nowrap">
            <thead>
                <tr>
                    <th width="7%">ID</th>
                    <th width="7%">ID Thành Phố</th>
                    <th>Tên Thành Phố</th>
                    <th>Khu Vực</th>
                    <th>Quốc Gia</th>
                    <th>Kinh độ và Vĩ Độ</th>
                    <th width="5%">Hành động</th>
                </tr>
            </thead>
            <tbody>
            @foreach($city as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->city_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->region }}</td>
                    <td>{{ $row->country }}</td>
                    <td>{{ $row->coord }}</td>
                    <td class="text-center">
                        <div class="btn-group-md btn-group btn-group-toggle">
                            <a class="btn btn-primary" href="{{route('get-edit-city',$row->id)}}" title="Sửa">
                                <i class="fas fa-edit color-white"></i>
                            </a>
                            <a class="btn btn-danger btn-delete" href="javascript:void(0)" data1="{{$row->id}}" title="Xóa">
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $('.btn-delete').click(function () {
        if(confirm("Bạn có muốn xóa không ?")){
            var focus = $(this).closest('tr');
            $.post("/admin/deleteCities/"+$(this).attr('data1'),{"_token": "{{ csrf_token() }}"},function(data){
                $(focus).remove();
                console.log(data);
                alert("Xóa thành công");
            })
        }
    });
</script>
@endsection
