<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
  </li>
  <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('logout.sentinel') }}" class="nav-link"
          onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout.sentinel') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </li>
</ul>