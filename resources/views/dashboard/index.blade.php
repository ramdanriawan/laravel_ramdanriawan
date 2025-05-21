@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"><i class="fa fa-info-circle fa-2x"></i></div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="total-transaksi-bulan-ini">0</div>
                            <div>Tiket belum selesai</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)">

                </a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"><i class="fa fa-check-circle fa-2x"></i></div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="total-transaksi-minggu-ini">0</div>
                            <div>Tiket selesai</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)">

                </a></div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"><i class="fa fa-envelope fa-2x"></i></div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="total-transaksi-hari-ini">0</div>
                            <div>Total tiket</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)">

                </a></div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"><i class="fa fa-group fa-2x"></i></div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="total-transaksi-hari-ini">0</div>
                            <div>User</div>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)">

                </a></div>
        </div>

    </div>

@endsection

<script src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

