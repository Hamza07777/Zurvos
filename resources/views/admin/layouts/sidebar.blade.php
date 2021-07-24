            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                           
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->name}}</p>

                        </div>
                    </div>
            
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="{{Route('home')}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Orders</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('order-detail')}}"><i class="fa fa-angle-double-right"></i>All Order</a></li>
                                <li><a href="{{Route('most-order')}}"><i class="fa fa-angle-double-right"></i>Most Order Area</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file"></i> <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('report-generate')}}"><i class="fa fa-angle-double-right"></i>Generate Report</a></li>
                                <li><a href="{{Route('general-report-generate')}}"><i class="fa fa-angle-double-right"></i>General Report</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user" aria-hidden="true"></i> <span>Shopkeppers</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('shopkepper.create')}}"><i class="fa fa-angle-double-right"></i>Add Shopkepper</a></li>
                                <li><a href="{{Route('shopkepper.index')}}"><i class="fa fa-angle-double-right"></i>All Shopkepper</a></li>      
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money" aria-hidden="true"></i> <span>Expenses</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('expense.create')}}"><i class="fa fa-angle-double-right"></i>Add Expense</a></li>
                                <li><a href="{{Route('expense.index')}}"><i class="fa fa-angle-double-right"></i>All Expenses</a></li>      
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money" aria-hidden="true"></i> <span>Taxes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('tax.create')}}"><i class="fa fa-angle-double-right"></i>Add Tax</a></li>
                                <li><a href="{{Route('tax.index')}}"><i class="fa fa-angle-double-right"></i>All Taxes</a></li>      
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money" aria-hidden="true"></i> <span>Revenue</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('revenue')}}"><i class="fa fa-angle-double-right"></i>Revenue Record</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
<i class="fa fa-exchange" aria-hidden="true"></i> <span>Change</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('change')}}"><i class="fa fa-angle-double-right"></i>Change Record</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i><span>Permotions</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('permotion.create')}}"><i class="fa fa-angle-double-right"></i>Add Permotion</a></li>
                                <li><a href="{{Route('permotion.index')}}"><i class="fa fa-angle-double-right"></i>All Permotions</a></li>      
                            </ul>
                        </li>
                            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i><span>Exercise Library</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{Route('exercise-lib.create')}}"><i class="fa fa-angle-double-right"></i>Add New Library</a></li>
                                <li><a href="{{Route('exercise-lib.index')}}"><i class="fa fa-angle-double-right"></i>All Libraries</a></li>      
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>