<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth('admin')->user()->name }}</p>
        <p>{{
            auth('admin')->user()->roles == 'manger' ?
            'مدير' :
            'مسؤول'
         }}</p>
      </div>
    </div>

  <ul class="sidebar-menu">
    <li>
      <a href="{{ route('admin.Admins.index') }}">
        <i class="fa fa-shield"></i> <span>المسؤوليين</span>
        <small class="label pull-right bg-yellow">
          {{ count(App\Admin::all()) }}
        </small>
      </a>
    </li>
    <li>
      <a href="{{ route('admin.msgs.index') }}">
        <i class="fa fa-envelope-o"></i> <span>الرسائل</span>
        <small class="label pull-right bg-yellow">
          {{ count(App\Contact::all()) }}
        </small>
      </a>
    </li>


  </ul>
</section>
<!-- /.sidebar -->
</aside>
