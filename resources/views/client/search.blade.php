@extends('client.app')

@section('content')

<div class="hero" data-bg-image="{{ asset('assets/client/images/star.jpg') }}">
    <div class="container">
        <form action="{{route('search')}}" method="get" class="find-location" id="header-search" autocomplete="off">
            <input autocomplete="off" type="text" class="search-input" name="key" placeholder="Nhập tên thành phố">
            <button type="submit" class="btn-search">
                <i class="fas fa-search"></i>
            </button>
            <div id="result"></div>
        </form>
    </div>
    <div class="forecast-table">
        <div class="container main-daily">
            <div class="forecast-container">
                @foreach($weathers_daily as $key => $daily)

                <!-- TODO: print current  -->

                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">{{ getWeekday($daily->datetime) }}</div>
                        <div class="date">{{ $daily->datetime }}</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="isToday">
                            <div class="location">{{$nam}}</div>
                            <div class="degree">
                                <div class="num">{{ $daily->temp }}<sup>o</sup>C</div>
                                <div class="forecast-icon">
                                    <img src="{{ asset('assets/client/images/icons/icon-1.svg') }}" alt="" width=90>
                                </div>
                            </div>
                            <span><img src="{{ asset('assets/client/images/icon-umberella.png') }}" alt="">{{ $daily->rh }}%</span>
                            <span><img src="{{ asset('assets/client/images/icon-wind.png') }}" alt="">{{ $daily->wind_dir }}km/h</span>
                        </div>
                        <div class="notToday">
                            <div class="forecast-icon">
                                <img src="{{ asset('assets/client/images/icons/icon-3.svg') }}" alt="" width=48>
                            </div>
                            <div class="degree">{{ $daily->temp }}<sup>o</sup>C</div>
                        </div>
                    </div>
                    <div class="hourly">
                        @foreach($daily->hourly as $hourly)
                        <div class="hourly-item" data-toggle="modal" data-target="#hourly{{$hourly->id}}">
                            <div class="hourly-title">
                                <p>{{ $hourly->hour }}</p>
                            </div>
                            <div class="hourly-content">
                                <h2>{{ $hourly->temp }}<sup>o</sup>C</h2>
                            </div>
                            <div class="hourly-footer">
                                <img src="https://www.weatherbit.io/static/img/icons/{{ $hourly->weather_json->icon }}.png" />
                            </div>
                        </div>

                        <!-- The Modal -->
                        <div class="modal" id="hourly{{$hourly->id}}" style="color: #000">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Giờ: {{ $hourly->hour }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <img
                                            src="https://www.weatherbit.io/static/img/icons/{{ $hourly->weather_json->icon }}.png" />
                                        <p>Độ ẩm tương đối: {{ $hourly->rh }}%</p>
                                        <p>Tốc độ gió: {{ $hourly->wind_spd }}m/s</p>
                                        <p>Áp suất: {{ $hourly->pres }}</p>
                                        <p>Tầm nhìn xa: {{ $hourly->vis}}km</p>
                                        <p>Mực nước biển: {{ $hourly->slp }}mb</p>
                                        <p>Thời điểm: {{ $hourly->pod == "d"  ? 'Ngày' : 'Đêm' }}</p>
                                        <p>Điểm sương: {{ $hourly->dewpt }} C</p>
                                        <p>Hướng gió: {{ $hourly->wind_dir }} độ</p>
                                        <p>Nhiệt độ: {{ $hourly->temp }} C</p>
                                        <p>Lượng mây: {{ $hourly->clouds }} %</p>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

@push("scripts")
<script type="text/javascript">
    $('#header-search').on('keyup', function () {
        var search = $(this).find('.search-input').val();
        if (search == '') {
            $("#result").hide()
        } else {
            axios.get('/search', {
                    params: {
                        search: search
                    }
                })
                .then(res => {
                    let html = "";
                    res.data.result.forEach(e => {
                        html += `<p>${e.name}</p>`;
                    });
                    console.log(html);
                    $("#result").show();
                    $("#result").html(html);

                }).catch(err => {
                    console.log({
                        err: err
                    })
                });
        };
    });

    $(".forecast").click(function (e) {
        e.preventDefault();
        $('.forecast').removeClass('today');
        $(this).addClass("today");
    })

</script>
@endpush
