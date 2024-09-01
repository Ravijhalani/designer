<div id="mySidebar" class="sidebar">
    <a href="#"
      ><img
        src="{{ asset('youAsk.png') }}"
        alt="adminPanelLogo"
        class="admin-Panel-Logo"
    /></a>
    <div class="tabs-main-parent">
      <div class="tabs-parent d-flex flex-column gap-2">
        <div class="menu-tabs active d-flex gap-2">
          <i class="uil uil-chart-pie-alt"></i>
          <a
            class="menu-tabs active p-0 m-0"
            href="{{ route('dashboard') }}"
            >Home</a
          >
        </div>
        <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-user"></i>
          <a class="menu-tabs p-0 m-0" href="{{ route('user.profile') }}">My profile</a>
        </div>
        {{-- <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-bag"></i>
          <a class="menu-tabs p-0 m-0" href="#">Applied jobs</a>
        </div> --}}
        <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-plus"></i>
          <a class="menu-tabs p-0 m-0" href="{{ route('service.index') }}"
            >Services</a
          >
        </div>
        <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-check"></i>
          <a class="menu-tabs p-0 m-0" href="{{route('availablity.index')}}">Availability</a>
        </div>
        <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-file-landscape-alt"></i>
          <a class="menu-tabs p-0 m-0" href="{{ route('basicinfo') }}"
            >Profile Settings</a
          >
        </div>
      </div>
      <div class="tabs-parent d-flex flex-column gap-2 mb-2">
        <div class="menu-tabs d-flex gap-2">
          <i class="uil uil-info-circle"></i>
          <a class="menu-tabs p-0 m-0" href="#">Help & support</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <div class="menu-tabs d-flex gap-2 text-danger">
          <i class="uil uil-comment-info"></i>
          <a class="menu-tabs p-0 m-0 text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</a>
        </div>

    </form>


      </div>
    </div>
  </div>
