@extends('admin.layouts.main')
@section('title','Trang chủ')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                    Thống kê nhiệt độ trong tuần
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                            <div class="widget-chat-wrapper-outer">
                                <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Nhiệt độ cao nhất</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">23<sup>o</sup>C</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Nhiệt độ thấp nhất</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning">18<sup>o</sup>C</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Độ ẩm trung bình</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-danger">45,9<span> %</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Lượng mưa trung bình</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-info">200<span> mm</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
