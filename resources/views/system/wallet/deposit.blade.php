@extends('system.master')

@section('title')
Deposit
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
                        <li><i class="fa fa-share"></i></li>
                        <li><a href="">Deposit</a></li>
                    </ul>
                    <!-- END Dashboard Header -->

                    <!-- Dashboard Content -->
                    <div class="row gutter30">
                        <div class="col-sm-6">
                                <div class="block">
                                    <div class="block-title text-center"><h4>BTC (BITCOIN)</h4></div>
                                        <h3 class="text-center">WALLET ADDRESS</h3>
                                        <div class="row text-center">
                                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=AWciPUDuXnGASCPrapWPHekVWGHLRKPAPF&choe=UTF-8"/>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary" onclick="myFunction()"><i class="fa fa-copy"></i> COPY</button>
                                            </span>
                                            <input type="text" id="linkref" name="example-input1-group2" class="form-control" value="AWciPUDuXnGASCPrapWPHekVWGHLRKPAPF">
                                        </div>
                                    <p></p>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="block">
                                    <div class="block-title text-center"><h4>ETH (ETHEREUM)</h4></div>
                                        <h3 class="text-center">WALLET ADDRESS</h3>
                                        <div class="row text-center">
                                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=AWciPUDuXnGASCPrapWPHekVWGHLRKPAPF&choe=UTF-8"/>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary" onclick="myFunction()"><i class="fa fa-copy"></i> COPY</button>
                                            </span>
                                            <input type="text" id="linkref" name="example-input1-group2" class="form-control" value="AWciPUDuXnGASCPrapWPHekVWGHLRKPAPF">
                                        </div>
                                    <p></p>
                                </div>
                        </div>
                    </div>
                       

                </div>
                <!-- END Page Content -->
@endsection

@section('script')

@endsection

