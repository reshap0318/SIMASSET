<div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="{{url('dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>SIM-ASET</span></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      @if(is_null(Sentinel::getUser()->avatar)||Sentinel::getUser()->avatar=="")
        <img src="{{ asset('/img/lea.png') }}" alt="..." class="img-circle profile_img">
      @else
        <img src="{{ url('avatar/profile-pict/'.Sentinel::getUser()->avatar) }}" alt="..." class="img-circle profile_img" style="height: 70px;width: 70px">
      @endif

    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>{{Sentinel::getuser()->nama}}</h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        @if (Sentinel::getUser()->hasAccess(['user.index','role.index']))
          <li><a><i class="fa fa-users"></i>Users Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              @if (Sentinel::getUser()->hasAccess(['user.index']))
                <li><a href="{{route('user.index')}}">User</a></li>
              @endif
              @if(Sentinel::getUser()->hasAccess(['role.index']))
              <li><a href="{{route('role.index')}}">Role</a></li>
              @endif
            </ul>
          </li>
        @endif



        @if(Sentinel::getUser()->hasAccess(['barang.index']))
          <li><a href="{{ route('barang.index') }}"><i class="fa fa-cubes"></i>Barang</a></li>
        @endif

        @if(Sentinel::getUser()->hasAccess(['satker.index']))
          <li><a href="{{ route('satker.index') }}"><i class="fa fa-building"></i>Satuan Kerja</a></li>


        @endif

        
        <li><a><i class="fa fa-bookmark  "></i>Transaksi BMN<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="">Perolehan BMN</a></li>
                <li><a href="">Perubahan BMN</a></li>
                <li><a href="">Inventaris Dan Penilaian Kembali</a></li>          
                <li><a href="">Penghapusan BMN</a></li>
            </ul>
          </li>
          
          <li><a><i class="fa fa-bookmark  "></i>Laporan<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="">Laporan Kondisi Barang </a></li>
                <li><a href="">Laporan Barang Hilang</a></li>
                <li><a href="">Laporan Barang Rusak Berat</a></li>
                <li><a href="">Inventaris Dan Penilaian Kembali</a></li> 
                <li><a href="">Penghapusan BMN</a></li>
            </ul>
          </li>
          
          <li><a><i class="fa fa-bookmark  "></i>Buku/Daftar<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="">Buku Barang </a></li>
                <li><a href="">Buku Barang Bersejarah</a></li>
               
            </ul>
          </li>

          



        @if(Sentinel::getUser()->hasAccess(['datamaster.index']))
          <li><a><i class="fa fa-bookmark  "></i>Aset <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('datamaster.index',['aset=Lancar'])}}">Tidak Tetap</a></li>
                <li><a href="{{route('datamaster.index',['aset=Tetap'])}}">Tetap</a></li>
                @if(Sentinel::getUser()->hasAccess(['datamaster.create']))
                  <li><a href="{{route('datamaster.create')}}">New Aset</a></li>
                @endif
            </ul>
          </li>
        @endif
          <li><a href="{{ url('My-QrCode') }}"><i class="fa fa-qrcode"></i>My QR-Code</a></li>



      </ul>

    </div>

  </div>
  <!-- /sidebar menu -->

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  <!-- /menu footer buttons -->
</div>
