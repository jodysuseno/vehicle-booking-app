<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="30px" height="30px"
      src="{{ asset('valiadmin/images/jodykrido.jpg')}}" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">@auth {{ Auth::user()->name }} @endauth </p>
      <p class="app-sidebar__user-designation">@auth {{ Auth::user()->level }} @endauth</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item @if ($title == 'Dashboard') active @endif" href="/"><i class="app-menu__icon fa fa-dashboard"></i><span
          class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item @if ($title == 'Vehicle') active @endif" href="/vehicle"><i class="app-menu__icon fa fa-truck"></i><span
          class="app-menu__label">Vehicle</span></a></li>
    <li><a class="app-menu__item @if ($title == 'Driver') active @endif" href="/driver"><i class="app-menu__icon fa fa-users"></i><span
          class="app-menu__label">Driver</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Vehicle Usage</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Booking') active @endif" href="/booking"><i class="icon fa fa-circle-o"></i> Booking</a></li>
        {{-- <li><a class="treeview-item @if ($title == 'Fuel Consumtion') active @endif" href="/fuel"><i class="icon fa fa-circle-o"></i> Fuel Consumtion</a></li>
        <li><a class="treeview-item @if ($title == 'Service') active @endif" href="/service"><i class="icon fa fa-circle-o"></i> Service</a></li> --}}
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Report</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item @if ($title == 'Booking Periodic') active @endif" href="/report"><i class="icon fa fa-circle-o"></i> Booking Periodic</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
          class="app-menu__icon fa fa-gear"></i><span class="app-menu__label">Settings</span><i
          class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
      @if (auth()->user()->level=="admin")
        <li><a class="treeview-item @if ($title == 'Users') active @endif" href="/user"><i class="icon fa fa-circle-o"></i> Users</a></li>
      @endif
        <li><a class="treeview-item @if ($title == 'Settings') active @endif" href="/user"><i class="icon fa fa-circle-o"></i> Settings</a></li>
      </ul>
    </li>
  </ul>
</aside>
