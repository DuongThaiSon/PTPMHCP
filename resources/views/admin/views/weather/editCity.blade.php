@extends('admin.layouts.main')
@section('title','Sửa thông tin thành phố')
@section('content')
<div class="main-card mb-3 card p-3 h-50">
    <form action="{{route('post-edit-city',$city->id)}}" method="post">
        @CSRF
        <div class="col-lg-5 mx-auto">
            <div class="form-group">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name" placeholder="rh" value="{{$city->name}}">
            </div>
            <div class="form-group">
                <label for="">Khu vực</label>
                <input type="text" class="form-control" name="region" placeholder="max_wind_spd" value={{$city->region}}>
            </div>
            <div class="form-group">
                <label for="">Quốc gia</label>
                <input type="text" class="form-control" name="country" placeholder="wind_gust_spd" value={{$city->country}}>
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