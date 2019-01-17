  <div class="row remove-margin">
                            <!-- Title -->
                            <div class="col-md-4">
                                <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
                                <a href="" class="header-title-link">
                                    <h1><i class="fa fa-user animation-expandUp"></i>{{ Session('user')->User_ID }}<br><small>Welcome {{ Session('user')->User_Name }}</small></h1>
                                </a>
                            </div>
                            <!-- END Title -->

                            <!-- Statistics -->
                            <div class="col-md-8">
                                <!-- Outer Grid -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Inner Grid 1 -->
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="page_comp_charts.html" class="header-link">
                                                    <h1 class="animation-pullDown">
                                                        <strong>{{ number_format(0,5) }}</strong><br><small>BTC</small>
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="page_comp_charts.html" class="header-link">
                                                    <h1 class="animation-pullDown">
                                                        <strong>{{ number_format(0,5) }}</strong><br><small>ETH</small>
                                                    </h1>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- END Inner Grid 1 -->
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Inner Grid 2 -->
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="page_special_timeline.html" class="header-link">
                                                    <h1 class="animation-pullDown">
                                                        <strong>{{ number_format(0) }}</strong><br><small>$</small>
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="page_special_message_center.html" class="header-link">
                                                    <h1 class="animation-pullDown">
                                                        <strong>{{ number_format(0) }}</strong><br><small>Lucky Point</small>
                                                    </h1>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- END Inner Grid 2 -->
                                    </div>
                                </div>
                                <!-- END Outer Grid  -->
                            </div>
                            <!-- END Statistics -->
                        </div>