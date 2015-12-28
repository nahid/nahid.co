<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{Auth::user()->image}}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>

            <a href="#"><i class="fa fa-user text-warning"></i> {{ucfirst(Auth::user()->role)}}</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="{{url('admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->role=='admin' || auth()->user()->role=='author')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Diary</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href={{url('admin/diary/new')}}><i class="fa fa-angle-double-right"></i>New Diary</a></li>
                <li><a href="{{url('admin/diary/all')}}"><i class="fa fa-angle-double-right"></i>All Diary</a></li>
                @if(auth()->user()->role=='admin')
                <li><a href="{{url('admin/diary/category')}}"><i class="fa fa-angle-double-right"></i>Category</a></li>
                <li><a href="{{url('admin/diary/tags')}}"><i class="fa fa-angle-double-right"></i>Manage Tags</a></li>
                @endif
            </ul>
        </li>
        @endif
        @if(auth()->user()->role=='admin')
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i> <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('admin/users/manage')}}"><i class="fa fa-angle-double-right"></i>Manage Users</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i>Users Report</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog"></i> <span>Preference</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i>Contact Info</a></li>
                <li><a href="{{url('/admin/resume/edu')}}"><i class="fa fa-angle-double-right"></i>Manage Educations</a></li>
                <li><a href="{{url('/admin/resume/work')}}"><i class="fa fa-angle-double-right"></i>Manage Works</a></li>
            </ul>
        </li>
        @endif
    </ul>
</section>
