            {{-- <header>
              <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">
                  <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                  </a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">

                    </ul>
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                          <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name ?? '' }}</h6>
                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->getRoleNames()->first() ?? '' }}</p>
                          </div>
                          <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                              <img src="{{ asset('dist/assets/compiled/jpg/1.jpg') }}">
                            </div>
                          </div>
                        </div>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                          <h6 class="dropdown-header">Hello, {{ Auth::user()->name ?? '' }}!</h6>
                        </li>
                        <li>
                          <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                              class="icon-mid bi bi-person me-2"></i> My
                            Profile</a>
                        </li>
                        <hr class="dropdown-divider">
                        </li>
                        <li>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                          </form>

                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </header> --}}


            <nav class="navbar navbar-header navbar-expand navbar-light">
              <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
              <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                  {{--  <li class="dropdown nav-icon">
                    <a href="#" data-toggle="dropdown"
                      class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                      <div class="d-lg-inline-block">
                        <i data-feather="bell"></i>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                      <h6 class='py-2 px-4'>Notifications</h6>
                      <ul class="list-group rounded-none">
                        <li class="list-group-item border-0 align-items-start">
                          <div class="avatar bg-success mr-3">
                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                          </div>
                          <div>
                            <h6 class='text-bold'>New Order</h6>
                            <p class='text-xs'>
                              An order made by Ahmad Saugi for product Samsung Galaxy S69
                            </p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                   <li class="dropdown nav-icon mr-2">
                    <a href="#" data-toggle="dropdown"
                      class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                      <div class="d-lg-inline-block">
                        <i data-feather="mail"></i>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                      <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                      <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                          data-feather="log-out"></i> Logout</a>

                    </div>
                  </li> --}}
                  <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                      <div class="avatar mr-1">
                        <img src="{{ asset('dist/assets/images/avatar/avatar-s-1.png') }}" alt=""
                          srcset="">
                      </div>
                      <div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::user()->name ?? '' }} </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <p class="dropdown-item">Role : {{ Auth::user()->getRoleNames()->first() ?? '' }}</p>

                      <a class="dropdown-item" href="{{ route('profile.edit') }}"><i data-feather="user"></i>
                        Account</a>
                      {{-- <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a> --}}
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                          data-feather="log-out"></i> Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>
