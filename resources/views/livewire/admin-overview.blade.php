<div class="row mx-2">
    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-bell"></i>
        <div class="dashstat_content">
          <h3>{{ $totalOrders }}</h3>
          <p>Total Reminder</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-calendar-days"></i>
        <div class="dashstat_content">
          <h3>{{ $totalProducts }}</h3>
          <p>Total Jadwal</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-user"></i>
        <div class="dashstat_content">
          <h3>{{ $totalCategories }}</h3>
          <p>Total Dosen</p>
        </div>
      </div>
    </div>

    <!-- Navicard -->
    <div class="navicards">
        <div class="row">
          <div class="col-lg-6">
            <a href="{{route('admin.orders')}}">
              <div class="navcard">
                <div class="nc_left">
                  <i class="fa-solid fa-bell"></i>
                  <p>Cek Reminder</p>
                </div>

                <div class="nc_right">
                  <i class="fa-solid fa-arrow-right-long"></i>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-6">
            <a href="{{route('admin.add-product')}}">
              <div class="navcard">
                <div class="nc_left">
                  <i class="fa-solid fa-calendar-days"></i>
                  <p>Tambah Jadwal Bimbingan</p>
                </div>

                <div class="nc_right">
                  <i class="fa-solid fa-arrow-right-long"></i>
                </div>
              </div>
            </a>
          </div>
        </div>
       </div>
  </div>
