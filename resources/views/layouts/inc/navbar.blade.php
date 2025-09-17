<nav
  id="layout-navbar"
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
>
  <!-- Toggle menu (mobile) -->
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="ti ti-menu-2 ti-md"></i>
    </a>
  </div>

  <!-- Navbar Content -->
  <div id="navbar-collapse" class="navbar-nav-right d-flex align-items-center">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item navbar-search-wrapper mb-0">
        <a
          class="nav-item nav-link search-toggler d-flex align-items-center px-0"
          href="javascript:void(0);"
        >
          <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
          <span class="d-none d-md-inline-block text-muted fw-normal">
            Search (Ctrl+/)
          </span>
        </a>
      </div>
    </div>
    <!-- /Search -->

    <!-- Right side -->
    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- User Dropdown -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a
          class="nav-link dropdown-toggle hide-arrow p-0"
          href="javascript:void(0);"
          data-bs-toggle="dropdown"
        >
          <div class="avatar avatar-online">
            <img
              src="../../assets/img/avatars/1.png"
              alt="User Avatar"
              class="rounded-circle"
            />
          </div>
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
          <!-- User Info -->
          <li>
            <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">
                  <div class="avatar avatar-online">
                    <img
                      src="../../assets/img/avatars/1.png"
                      alt="User Avatar"
                      class="rounded-circle"
                    />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0">Administrator</h6>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>

          <li><div class="dropdown-divider my-1 mx-n2"></div></li>

          <!-- Profile -->
          <li>
            <a class="dropdown-item" href="pages-profile-user.html">
              <i class="ti ti-user me-3 ti-md"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>

          <!-- Logout -->
          <li>
            <div class="d-grid px-2 pt-2 pb-1">
              <a
                class="btn btn-sm btn-danger d-flex align-items-center"
                href="auth-login-cover.html"
              >
                <small class="align-middle">Logout</small>
                <i class="ti ti-logout ms-2 ti-14px"></i>
              </a>
            </div>
          </li>
        </ul>
      </li>
      <!-- /User Dropdown -->
    </ul>
  </div>

  <!-- Search Small Screens -->
  <div class="navbar-search-wrapper search-input-wrapper d-none">
    <input
      type="text"
      class="form-control search-input container-xxl border-0"
      placeholder="Search..."
      aria-label="Search..."
    />
    <i class="ti ti-x search-toggler cursor-pointer"></i>
  </div>
</nav>