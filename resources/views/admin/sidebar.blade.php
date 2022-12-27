<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link header-admin">
      <img style="scale: 75%;
      position: relative;
      left: -10%;" src="/template/images/icons/image-logo-icon.png" alt="AdminLTE Logo" class="brand-image elevation-3" >
      <span style="position: relative;
            right: 10%;" class="brand-text font-weight-light">Quản trị viên</span>
      <a class="btn btn-sm btn-primary" href="{{ route('logout') }}" class="brand-text font-weight-light">Đăng xuất</a>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('email') }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="/admin" class="nav-link active">
                  <i class="fas fa-tachometer-alt"></i>
                  <p>Bảng điều khiển</p>
              </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p> Danh Mục
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm Danh Mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh Sách Danh Mục</p>
                    </a>
                </li>
            </ul>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p> Sản Phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/products/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm Sản Phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/products/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh Sách Sản Phẩm</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--  --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Banner
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/sliders/add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/sliders/list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách Banner</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cart-plus"></i>
            <p>
              Đơn hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/orders" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách đơn hàng</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user-tie"></i>
            <p>
              Khách hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/customers" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách khách hàng</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-ticket-alt"></i>
              <p> Khuyến mãi
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="/admin/coupons/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Thêm Khuyến Mãi</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/admin/coupons/list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh Sách Khuyến Mãi</p>
                  </a>
              </li>
          </ul>
        </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>