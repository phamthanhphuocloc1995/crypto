<!-- Left Sidebar -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- If you add the class .enable-hover, then a small portion of left sidebar will be visible and it can be opened with a mouse hover (> 1200px) (may affect website performance) -->
        <div id="sidebar-left" class="enable-hover">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Search Form -->
                <!-- <form action="page_ready_search_results.html" method="post" class="sidebar-search">
                    <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                </form> -->
                <!-- END Search Form -->

                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-left-scroll">
                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <!-- Welcome left-->
                        <li>
                            <h2 class="sidebar-header">Welcome</h2>
                        </li>
                        <li>
                            <a href="{{ route('system.getDashboard') }}" class="{{ (Route::current()->getName()=='system.getDashboard' ? 'active' : '') }}"><i class="fa fa-tachometer"></i>Dashboard</a>
                        </li>
                        <!-- End Welcome left-->

                        <!-- Members left-->
                        <li>
                            <h2 class="sidebar-header">Members</h2>
                        </li>
                        <li>
                            <a href="{{ route('system.getMemberlist') }}" class="{{ (Route::current()->getName()=='system.getMemberlist' ? 'active' : '') }}"><i class="fa fa-users"></i>Member List</a>
                        </li>
                        <!-- <li>
                            <a href="{{ route('system.getMembertree') }}"><i class="fa fa-tree"></i>Member Tree</a>
                        </li> -->
                        <li>
                            <h2 class="sidebar-header">Wallet</h2>
                        </li>
                        <li>
                            <a href="{{ route('system.getDeposit') }}" class="{{ (Route::current()->getName()=='system.getDeposit' ? 'active' : '') }}"><i class="fa fa-share"></i>Deposit</a>
                        </li>
                        <li>
                            <a href="{{ route('system.getExchangeBTC') }}" class="{{ (Route::current()->getName()=='system.getExchangeBTC' ? 'active' : '') }}"><i class="fa fa-refresh"></i>Exchange BTC - $</a>
                        </li>
                        <li>
                            <a href="{{ route('system.getExchangeETH') }}" class="{{ (Route::current()->getName()=='system.getExchangeETH' ? 'active' : '') }}"><i class="fa fa-refresh"></i>Exchange ETH - $</a>
                        </li>
                        <li>
                            <a href="{{ route('system.getWithdraw') }}" class="{{ (Route::current()->getName()=='system.getWithdraw' ? 'active' : '') }}"><i class="fa fa-reply"></i>Withdraw</a>
                        </li>
                        <!-- End Members left-->
                        <!-- ADMin left -->
                        <li>
                            <h2 class="sidebar-header">Admin</h2>
                        </li>
                        <li>
                        <a href="javascript:void(0)" class="">Game List</a>
                        </li>
                        <li>
                        <a href="javascript:void(0)" class="">Member List</a>
                        </li>
                        <li>
                        <a href="javascript:void(0)" class="">History Wallet</a>
                        </li>
                        <li>
                        <a href="javascript:void(0)" class="">History Game</a>
                        </li>
                        <li>
                        <a href="javascript:void(0)" class="">Stastictical</a>
                        </li>
                        <!-- End ADMin left -->
                    </ul>
                    <!-- END Sidebar Navigation -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Left Sidebar -->