        <div class="sidebar-menu">
          <ul class="menu">
            @foreach ($menus as $menu)
              @can($menu->permission_name)
                @php
                  // Determine if any of the submenu items are active
                  $isActive = false;
                  foreach ($menu->items as $item) {
                      if (request()->routeIs($item->route)) {
                          $isActive = true;
                          break;
                      }
                  }
                @endphp

                <li class="sidebar-item has-sub {{ $isActive ? 'active' : '' }} ">
                  <a href="#" class='sidebar-link'>
                    {{-- <i class="bi {{ $menu->icon }}"></i> --}}
                    <i data-feather="{{ $menu->icon }}"></i>
                    <span>{{ $menu->name }}</span>
                  </a>

                  <ul class="submenu  {{ $isActive ? 'active' : '' }}">
                    @foreach ($menu->items as $item)
                      @can($item->permission_name)
                        <li class="submenu-item  ">
                          <a href="{{ route($item->route) }}"
                            class="submenu-link {{ request()->routeIs($item->route) ? 'text-primary' : '' }}">
                            {{ $item->name }}</a>
                        </li>
                      @endcan
                    @endforeach
                  </ul>
                </li>

                <!-- end foreach items -->
              @endcan
              <!-- end can menu -->
            @endforeach


            @if (Auth::check())
              @can('admin')
                <li class="sidebar-title">
                  <a class="dropdown-item" href="https://nugrohos-organization.gitbook.io/data-input-tapersip"
                    target="_blank" title="User Guide">
                    User Guide <i class="icon-mid bi bi-info-circle me-2"></i></a>
                </li>
              @endcan
              </li>
              <li class="sidebar-title"></li>
              {{-- Log Out --}}
              <li class="sidebar-item  ">
                <a class='sidebar-link' href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="bi bi-arrow-bar-left"></i>
                  <span>Logout</span>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </a>
              </li>
            @endif

          </ul>
        </div>
