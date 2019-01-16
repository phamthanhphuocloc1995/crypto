@extends('system.master')

@section('title')
Memberlist
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
                        <li><i class="fa fa-users"></i></li>
                        <li><a href="">Memberlist</a></li>
                    </ul>
                    <!-- END Dashboard Header -->
                    <!-- Begin content -->
                <div class="row gutter30">
                    <div class="block">
                        <div class="block-title"><h2>Member List</h2></div>

                        <!-- List -->
                        <div class="table-responsive">
                            <table id="general-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">User ID</th>
                                        <th class="text-center">User Name</th>
                                        <th class="text-center">User Email</th>
                                        <th class="text-center">User Avatar</th>
                                        <th class="text-center">User Registered DateTime</th>
                                        <th class="text-center">Children</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listmember as $member)
                                    <tr>
                                        <td class="text-center">{{ $member->User_ID }}</td>
                                        <td class="text-center">{{ $member->User_Name }}</td>
                                        <td class="text-center">{{ $member->User_Email }}</td>
                                        <td class="text-center"><img style="width:35px;height:35px" src="{{ $member->User_Avatar!='' ? asset('system/avatar').'/'.$member->User_Avatar : 'https://www.w3schools.com/w3images/avatar6.png' }}"></td>
                                        <td class="text-center">{{ $member->User_RegisteredDatetime }}</td>
                                        <td class="text-center">F{{ $member->f }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @if ($listmember->links()!='')
                                <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <!-- <div class="btn-group btn-group-sm pull-right">
                                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                                                <div class="btn-group btn-group-sm dropup">
                                                    <a href="javascript:void(0)" class="btn btn-default pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
                                                        <li class="divider"></li>
                                                        <li class="dropdown-header"><i class="fa fa-share"></i> Export Excel As</li>
                                                        <li><a href="javascript:void(0)">.pdf</a></li>
                                                        <li><a href="javascript:void(0)">.cvs</a></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                            <div class="btn-group btn-group-sm">
                                                {{ $listmember->links() }}
                                                <!-- <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Edit Selected"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="Delete Selected"><i class="fa fa-times"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                        <!-- End List -->
                    </div>
                </div>
                
                    <!-- End content -->
                </div>
                <!-- END Page Content -->
@endsection

@section('script')
@endsection