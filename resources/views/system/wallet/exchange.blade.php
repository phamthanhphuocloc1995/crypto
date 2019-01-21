@extends('system.master')

@section('title')
Exchange
@endsection

@section('page-content')
<!-- FX Container -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!--
                All effects apply in resolutions larger than 1200px width
                Add one of the following classes to #fx-container for setting an effect to main content when one of the sidebars are opened
                'fx-none'           remove all effects (better website performance)
                'fx-opacity'        opacity effect
                'fx-move'           move effect
                'fx-push'           push effect
                'fx-rotate'         rotate effect
                'fx-push-move'      push-move effect
                'fx-push-rotate'    push-rotate effect
            -->
            <div id="fx-container" class="fx-opacity">
                <!-- Page content -->
                <div id="page-content" class="block">
                    <!-- Dashboard Header -->
                    <div class="block-header">
                    @include('system.layouts.stastic')
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li><i class="fa fa-refresh"></i></li>
                        <li><a href="">Exchange</a></li>
                    </ul>
                    <!-- END Dashboard Header -->

                    <!-- Dashboard Content -->
                    <div class="row gutter30">
                        <div class="col-sm-6">
                                <div class="block">
                                    <div class="block-title text-center"><h4>Exchange {{ $currency }} to $</h4></div>
                                        <h4><label>Your current balance: <a>{{ number_format(0,5) }} {{ $currency }}</a></label></h4>
                                        <h4 style="display:none" id="labelneedtoexchange"></h4>
                                        <form action="{{ route('system.postExchangeBTC') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="needtoexchange_client" id="inputneedtoexchange">
                                            <select class="form-control" id="selamountUSD" name="amountUSD" onchange="calcneedtoexchange()">
                                                <option value="-1">Select the amount $ to exchange</option>
                                                <option value="50">50 $</option>
                                                <option value="100">100 $</option>
                                                <option value="200">200 $</option>
                                                <option value="500">500 $</option>
                                            </select>
                                            <br>
                                            <div class="text-center">
                                            <input type="submit" class="btn btn-primary" value="Exchange">
                                            </div>
                                            <br>
                                        </form>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="block">
                                    <div class="block-title text-center"><h4>Exchange $ to {{ $currency }}</h4></div>
                                        <h4><label>Your current balance: <a>{{ number_format(0) }} $</a></label></h4>
                                        <input type="number" step="1" pattern="\d+" class="form-control" value="" placeholder="Enter the amount $ exchange to {{ $currency }}">
                                        <br>
                                        <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Exchange">
                                        </div>
                                        <br>
                                </div>
                        </div>
                    </div>
                <div class="row gutter30">
                <h2 class="text-center"><a href="javascript:void(0)" style="text-decoration:none">Exchange BTC History</a></h2>
                <div class="table-responsive">
                            <table id="general-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Amount BTC</th>
                                        <th class="text-center">Amount USD</th>
                                        <th class="text-center">DateTime</th>
                                        <th class="text-center">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><a href="javascript:void(0)">{{ number_format(0,5) }}</a></td>
                                        <td class="text-center"><a href="javascript:void(0)">{{ number_format(0) }}</a></td>
                                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                                        <td><a href="javascript:void(0)" class="label label-success">Lifetime</a></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="btn-group btn-group-sm pull-right">
                                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                                                <div class="btn-group btn-group-sm dropup">
                                                    <a href="javascript:void(0)" class="btn btn-default pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
                                                        <li class="divider"></li>
                                                        <li class="dropdown-header"><i class="fa fa-share"></i> Export As</li>
                                                        <li><a href="javascript:void(0)">.pdf</a></li>
                                                        <li><a href="javascript:void(0)">.cvs</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Edit Selected"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Delete Selected"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                </div>
            </div>
                <!-- END Page Content -->
@endsection

@section('script')
<script>
function calcneedtoexchange() {
    var amountUSD = document.getElementById('selamountUSD').value;
    if (amountUSD == -1) { return; }
    @if ($currency == "BTC")
    var needtoexchange = amountUSD / {{ $PriceBTC }};
    @elseif ($currency == "ETH")
    var needtoexchange = amountUSD / {{ $PriceETH }};
    @else 
    var needtoexchange = 0;
    @endif
    needtoexchange = needtoexchange.toFixed(5);
    $('#labelneedtoexchange').html('<label>Need to exchange: <a>'+ needtoexchange +' {{ $currency }}</a></label>');
    $('#labelneedtoexchange').css('display','block');
    $('#inputneedtoexchange').val(needtoexchange);
}
</script>
@endsection

