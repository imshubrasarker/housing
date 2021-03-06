<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Housing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Demo Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeviewn">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Members
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.members.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Members</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.members.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add New Member </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fas fa-store-alt"></i>
                        <p>Land Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.land-purchase.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Land Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.land-purchase.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Land Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.bayna.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Bayna</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.bayna.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Bayna</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-drafting-compass"></i>
                        <p>Plot
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.plot.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Plot</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.plot.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Plot</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="fab fa-sellcast"></i>
                        <p>Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.sale.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Sales</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.sale.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Sales</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-university"></i>
                        <p>Bank
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.bank.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Bank</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.bank.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Bank</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.deposit.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Deposit</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.deposit.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Deposit</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fab fa-atlassian"></i>
                        <p>Reference
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.reference.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Reference</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.reference.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Reference</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fab fa-accusoft"></i>
                        <p>Nominees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.nominees.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Nominees</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.nominees.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add New Nominee </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-minus-circle"></i>
                        <p>Expense
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.expense-head.index') }}" class="nav-link">
                                <i class="fab fa-accusoft"></i>
                                <p>Manage Expense Head</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.expense.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Expense </p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.expense.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add New Expense </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user-shield"></i>
                        <p>Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a href="{{ route('admin.users.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add New User </p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
