@extends('system.master')

@section('title')
Profile
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
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="">Profile</a></li>
                    </ul>
                    <!-- END Dashboard Header -->
                    <!-- Begin content -->
                <div class="row gutter30">
                    <div class="block">
                        <div class="block-title"><h2>Security</h2></div>
                        <form action="{{ route('system.postUpdateotpverify') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label class="switch switch-warning">
                                    <input type="checkbox" name="checkbox-switch-otp" {{ Session('user')->User_OTP == 1 ? 'Checked' : '' }}><span></span>
                                </label>
                                <label class="col-md-1 control-label" style="font-size:18px">OTP Verify</label><br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-exchange"></i> Update Security</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row gutter30">
                        <div class="col-xs-6">
                            <form action="{{ route('system.postUpdatepassword') }}" method="post">
                            {{ csrf_field() }}
                                    <div class="form-group">
                                    <h2 class="text-center">Update Password</h2>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Username" disabled value="{{ Session('user')->User_Name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                            <input type="password" name="newpassword" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-exchange"></i> Update Password</button>
                                    </div>
                                </form>

                        </div>
                            <div class="col-xs-6">
                                <form action="{{ route('system.postUpdateavatar') }}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <h2 class="text-center">Update Avatar</h2>
                                    </div>
                                    <div class="form-group text-center">
                                    <img style="border-radius:50%" id="output" src="{{ Session('user')->User_Avatar != '' ? asset('system/avatar').'/'.Session('user')->User_Avatar : 'https://www.w3schools.com/w3images/avatar6.png' }}" width="100" height="90">
                                    </div>
                                    <div class="form-group">
                                        <input name="input_img" type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" name="submit-update" value="true" class="btn btn-primary"><i class="fa fa-exchange"></i> Update Avatar</button>
                                        <button type="submit" name="submit-delete" value="true" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Delete Avatar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    <!-- End content -->
                </div>
                <!-- END Page Content -->
@endsection

@section('script')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection