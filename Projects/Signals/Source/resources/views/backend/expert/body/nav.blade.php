<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow"  data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">

                      <img src="{{ (!empty($admin->photo)) ? asset($admin->photo) : asset('/frontend/upload/no_image.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />

                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ (!empty($admin->photo)) ? asset($admin->photo) : asset('/frontend/upload/no_image.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{$admin->name}}</span>
                            <small class="text-muted">{{$admin->username}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
   


<form id='logout_form' method="POST" action="{{ route('logout') }}">
@csrf
                    <li>

                      <a class="dropdown-item" href="#" onclick="document.getElementById('logout_form').submit()">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>

                      </a>
                    </li>

</form>

                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
