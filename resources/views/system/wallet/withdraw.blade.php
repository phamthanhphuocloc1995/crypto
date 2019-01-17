@extends('system.master')

@section('title')
Withdraw
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
                        <li><i class="fa fa-reply"></i></li>
                        <li><a href="">Withdraw</a></li>
                    </ul>
                    <!-- END Dashboard Header -->

                    <!-- Dashboard Content -->
                    <div class="row gutter30">
                        <div class="col-sm-6">
                                <div class="block">
                                    <div class="block-title text-center"><h4>BTC (BITCOIN)</h4></div>
                                    <form>
                                    <h4>Your Current Balance: <label><a href="javascript:void(0)" style="text-decoration:none">{{ number_format(0,5) }} BTC</a></label></h4>
                                    <h4><label>Wallet Address:</label></h4>
                                    <input type="text" placeholder="Enter your BTC Wallet Address" class="form-control">
                                    <br>
                                    <h4><label>Amount BTC:</label></h4>
                                    <input type="number" placeholder="Enter your Amount BTC you want to withdraw (Only Numbers)" class="form-control" id="amount1" oninput="calc(1)">
                                    <br>
                                    <h4><label>Real Amount BTC:</label></h4>
                                    <input type="number" value="0" class="form-control" readonly id="total1">
                                    <br>
                                    <h4><label><a href="javascript:void(0)" style="text-decoration:none">Fee : 3% Withdraw Amount BTC</a></label></h4>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="block">
                                <div class="block-title text-center"><h4>ETH (ETHEREUM)</h4></div>
                                    <form>
                                    <h4>Your Current Balance: <label><a href="javascript:void(0)" style="text-decoration:none">{{ number_format(0,5) }} ETH</a></label></h4>
                                    <h4><label>Wallet Address:</label></h4>
                                    <input type="text" placeholder="Enter your ETH Wallet Address" class="form-control">
                                    <br>
                                    <h4><label>Amount ETH:</label></h4>
                                    <input type="number" placeholder="Enter your Amount ETH you want to withdraw (Only Numbers)" class="form-control" id="amount2" oninput="calc(2)">
                                    <br>
                                    <h4><label>Real Amount ETH:</label></h4>
                                    <input type="number" value="0" class="form-control" readonly id="total2">
                                    <br>
                                    <h4><label><a href="javascript:void(0)" style="text-decoration:none">Fee : 3% Withdraw Amount ETH</a></label></h4>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>   
                                </div>
                        </div>
                    </div>
                       

                </div>
                <!-- END Page Content -->
@endsection

@section('script')
<script>

		function calc(wallet) {

			if (wallet == 2) {

				var amount = parseFloat(document.getElementById("amount2").value);

			}



			else if (wallet == 1) {

				var amount = parseFloat(document.getElementById("amount1").value);

			}

			var fee = parseFloat((amount*3)/100);

			amount = isNaN(amount) ? 0 : amount;

			fee = isNaN(fee) ? 0 : fee;

			if (wallet == 2) {

				document.getElementById("total2").value = amount + fee;

			}


			else if (wallet == 1) {

				document.getElementById("total1").value = amount + fee;

            }

		}

	</script>
@endsection

