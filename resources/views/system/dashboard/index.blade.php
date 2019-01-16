@extends('system.master')

@section('title')
Dashboard
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
                        <li><i class="fa fa-dashboard"></i></li>
                        <li><a href="">Dashboard</a></li>
                    </ul>
                    <!-- END Dashboard Header -->

                    <!-- Dashboard Content -->
                    <div class="row gutter30">
                        <!-- Lucky Point Price -->
                        <div class="col-sm-3">
                            <div class="block">
                                <div class="block-title text-center"><h4>Lucky Point Price</h4></div>
                                <h1 class="animation-pullDown">
                                <a href="javascript:void(0)" style="text-decoration:none">
                                <strong>{{ number_format(App\Price::getLuckyPrice(),1) }}$ = {{ number_format(1) }} Point</strong>
                                </a>
                                </h1>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="block">
                                <div class="block-title text-center"><h4>Link Referral Member</h4></div>
                                    <!-- <h3 class="text-center">Total Member: <a href="javascript:void(0)">{{ number_format(App\User::GetCountUserChildren(Session('user'))) }}</a></h3> -->
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onclick="myFunction()"><i class="fa fa-copy"></i> COPY</button>
                                        </span>
                                        <input type="text" id="linkref" name="example-input1-group2" class="form-control" value="{{ route('system.getSignup').'?ref='.Session('user')->User_ID }}">
                                    </div>
                                    <br>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="block">
                                <div class="block-title text-center"><h4>Total Referral Member</h4></div>
                                <a href="{{ route('system.getMemberlist') }}"><h1 class="text-center"><strong>Member: {{ number_format(App\User::GetCountUserChildren(Session('user'))) }}</strong></h1></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END Page Content -->
@endsection

@section('script')
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("linkref");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
@endsection

