@extends('admin.layouts.main')
@section('title','Sửa thời tiết hàng ngày')
@section('content')
<div class="main-card mb-3 card p-3">
    <form action="{{route('post-edit-daily',$weather_daily->id)}}" method="post">
        @CSRF
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Độ ẩm trung bình</label>
                    <input type="text" class="form-control" name="rh" placeholder="rh" value="{{$weather_daily->rh}}">
                </div>
                <div class="form-group">
                    <label for="">Tốc độ gió max</label>
                    <input type="text" class="form-control" name="max_wind_spd" placeholder="max_wind_spd" value="{{$weather_daily->max_wind_spd}}">
                </div>
                <div class="form-group">
                    <label for="">Tốc độ gió mạnh</label>
                    <input type="text" class="form-control" name="wind_gust_spd" placeholder="wind_gust_spd" value="{{$weather_daily->wind_gust_spd}}">
                </div>
                <div class="form-group">
                    <label for="">Lượng mây trung bình</label>
                    <input type="text" class="form-control" name="clouds" placeholder="clouds" value="{{$weather_daily->clouds}}">
                </div>
                <div class="form-group">
                    <label for="">Lượng mưa trung bình</label>
                    <input type="text" class="form-control" name="precip_gpm" placeholder="precip_gpm" value="{{$weather_daily->precip_gpm}}">
                </div>
                <div class="form-group">
                    <label for="">Tốc độ gió trung bình</label>
                    <input type="text" class="form-control" name="wind_spd" placeholder="wind_spd" value="{{$weather_daily->wind_spd}}">
                </div>
                <div class="form-group">
                    <label for="">Mực nước biển trung bình</label>
                    <input type="text" class="form-control" name="slp" placeholder="slp" value="{{$weather_daily->slp}}">
                </div>
                <div class="form-group">
                    <label for="">Nhiệt độ trung bình</label>
                    <input type="text" class="form-control" name="temp" placeholder="temp" value="{{$weather_daily->temp}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Áp suất trung bình</label>
                    <input type="text" class="form-control" name="pres" placeholder="pres" value="{{$weather_daily->pres}}">
                </div>
                <div class="form-group">
                    <label for="">Điểm sương trung bình</label>
                    <input type="text" class="form-control" name="dewpt" placeholder="dewpt" value="{{$weather_daily->dewpt}}">
                </div>
                <div class="form-group">
                    <label for="">Lượng mưa tích lũy</label>
                    <input type="text" class="form-control" name="precip" placeholder="precip" value="{{$weather_daily->precip}}">
                </div>
                <div class="form-group">
                    <label for="">Hướng gió trung bình</label>
                    <input type="text" class="form-control" name="wind_dir" placeholder="wind_dir" value="{{$weather_daily->wind_dir}}">
                </div>
                <div class="form-group">
                    <label for="">Nhiệt độ lớn nhất</label>
                    <input type="text" class="form-control" name="max_temp" placeholder="max_temp" value="{{$weather_daily->max_temp}}">
                </div>
                <div class="form-group">
                    <label for="">Nhiệt độ nhỏ nhất</label>
                    <input type="text" class="form-control" name="min_temp" placeholder="min_temp" value="{{$weather_daily->min_temp}}">
                </div>
                <div class="form-group">
                    <label for="">Hướng gió lớn nhất</label> 
                    <input type="text" class="form-control" name="max_wind_dir" placeholder="max_wind_dir" value="{{$weather_daily->max_wind_dir}}">
                </div>
                <div class="form-group">
                    <label for="">Lượng tuyết</label>
                    <input type="text" class="form-control" name="snow" placeholder="snow" value="{{$weather_daily->snow}}">
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