@extends('admin.layouts.main')
@section('title','Sửa thời tiết theo giờ')
@section('content')
<div class="main-card mb-3 card p-3">
    <form action="{{route('post-edit-hourly',$weather_hourly->id)}}" method="post">
        @CSRF
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Độ ẩm trung bình</label>
                    <input type="text" class="form-control" name="rh" placeholder="rh" value={{$weather_hourly->rh}}>
                </div>
                <div class="form-group">
                    <label for="">Tốc độ gió trung bình</label>
                    <input type="text" class="form-control" name="wind_spd" placeholder="max_wind_spd" value={{$weather_hourly->wind_spd}}>
                </div>
                <div class="form-group">
                    <label for="">Tầm nhìn xa</label>
                    <input type="text" class="form-control" name="vis" placeholder="wind_gust_spd" value={{$weather_hourly->vis}}>
                </div>
                <div class="form-group">
                    <label for="">Mực nước biển trung bình</label>
                    <input type="text" class="form-control" name="slp" placeholder="clouds" value={{$weather_hourly->slp}}>
                </div>
                <div class="form-group">
                    <label for="">Áp suất trung bình</label>
                    <input type="text" class="form-control" name="pres" placeholder="precip_gpm" value={{$weather_hourly->pres}}>
                </div>
                <div class="form-group">
                    <label for="">Điểm sương trung bình</label>
                    <input type="text" class="form-control" name="dewpt" placeholder="wind_spd" value={{$weather_hourly->dewpt}}>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Lượng tuyết</label>
                    <input type="text" class="form-control" name="snow" placeholder="slp" value={{$weather_hourly->snow}}>
                </div>
                <div class="form-group">
                    <label for="">Hướng gió trung bình</label>
                    <input type="text" class="form-control" name="wind_dir" placeholder="temp" value={{$weather_hourly->wind_dir}}>
                </div>
                <div class="form-group">
                    <label for="">Nhiệt độ</label>
                    <input type="text" class="form-control" name="app_temp" placeholder="pres" value={{$weather_hourly->app_temp}}>
                </div>
                <div class="form-group">
                    <label for="">Nhiệt độ trung bình</label>
                    <input type="text" class="form-control" name="temp" placeholder="dewpt" value={{$weather_hourly->temp}}>
                </div>
                <div class="form-group">
                    <label for="">Lượng mưa tích lũy</label>
                    <input type="text" class="form-control" name="precip" placeholder="precip" value={{$weather_hourly->precip}}>
                </div>
                <div class="form-group">
                    <label for="">Lượng mây trung bình</label>
                    <input type="text" class="form-control" name="clouds" placeholder="wind_dir" value={{$weather_hourly->clouds}}>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn-edit btn btn-info mx-auto">Sửa</button>
        </div>
    </form>
</div>
<script>
    var msg = '{{Session::get('thongbao')}}';
    var exist = '{{Session::has('thongbao')}}';
    if(exist){
        alert(msg);
    }
</script>
@endsection