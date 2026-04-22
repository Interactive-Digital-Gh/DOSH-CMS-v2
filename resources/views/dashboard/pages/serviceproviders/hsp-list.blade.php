<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>!D - Admin</title>
    {{-- Favicon  --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">


  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') . '?v=2.0' }}">
  <!-- endinject -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon_io/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon_io/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('assets/favicon_io/site.webmanifest') }}">
    {{-- Toastify  --}}
    @toastifyCss
    {{-- TinyMCE head  --}}
    <x-head.tinymce-config/>
</head>
{{-- @if(count($errors) > 0)
@foreach($errors->all() as $error)
    {{ toastify()->error($error) }}
@endforeach
@endif --}}
@foreach ($errors->all() as $error)
    {{ toastify()->error($error) }}
@endforeach

@if(session('success'))
    {{ toastify()->success(session('success')) }}
@endif

@if(session('info'))
    {{ toastify()->info(session('info')) }}
@endif

@if(session('error'))
    {{ toastify()->error(session('error')) }}
@endif


<body>
  <div class="container-scroller">


    {{-- Navbar  --}}
    @include('dashboard.partials.navbar')
    {{-- End Navbar --}}


    <div class="container-fluid page-body-wrapper">


    {{-- Sidebar  --}}
    @include('dashboard.partials.sidebar')
    {{-- End Sidebar  --}}


      <div class="main-panel">
        <div class="content-wrapper">

<div class="col-12 grid-margin stretch-card">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New HSP</h4>
                  <div class="template-demo">
                    <a href="{{ route('hsp-create') }}" class="btn btn-primary btn-lg btn-block">
                      <i class="icon-plus"></i>
                      Create New HSP
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search HSP</h4>
                  <form method="POST" action="{{ route('hsp-search') }}" class="forms-sample">
                        @csrf
                        <div class="form-group">
                        <input type="text" name="hsp_name" class="form-control" id="" value="" placeholder="Health Service Provider Name">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" value="submit">
                            <i class="icon-search"></i>
                            Search
                        </button>
                  </form>
                </div>
              </div>
            </div>
</div>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Filter Form</h4>
      <p class="card-description">
        Filter HSPs by country and region
      </p>
      <form action="{{ route('hsp-list') }}" method="GET" class="form-inline w-100 d-flex flex-wrap justify-content-between">
        <div class="form-group mb-3 mr-3 flex-fill">
          <label for="inlineFormSelectName" class="mb-1">Country</label>
          <select name="country" class="form-control form-control-lg w-100" id="inlineFormSelectName">
            <option value="">All</option>
            @foreach ($countries as $country)
            <option>{{ $country->country }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group mb-3 mr-3 flex-fill">
          <label for="inlineFormSelectUsername" class="mb-1">Region</label>
          <select name="region" class="form-control form-control-lg w-100" id="inlineFormSelectUsername">
            <option value="">All</option>
            @foreach ($regions as $region)
            <option>{{ $region->region_name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>
    </div>
  </div>
</div>




            <div class="row">
            <div class="col-xl-12 grid-margin-lg-0 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table of HSPs</h4>
                    <p>List of HSPs in {{ request('country') ?? 'All Countries' }} - {{ request('region') ?? 'All Regions' }}</p>
                    <div class="table-responsive mt-3">
                    <table class="table table-header-bg">
                    <thead>
                        <tr>
                        <th>Hospital Name</th>
                        <th>Country</th>
                        <th>Region</th>
                        <th>District</th>
                        <th>Email</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hsp as $hospital)
                        <tr>
                        <td>{{ $hospital->hospital_name }}</td>
                        <td>{{ $hospital->country }}</td>
                        <td>{{ $hospital->region_name }}</td>
                        <td>{{ $hospital->district }}</td>
                        <td>{{ $hospital->email }}</td>
                        <td>
                            <div class="btn-group">
                            <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="dropdown">
                                <i class="mdi mdi-menu"></i>
                            </button>
                            <div class="dropdown-menu">
                                <form method="GET" action="{{ route('hsp-edit', $hospital->id) }}">
                                @csrf
                                <button type="submit" class="dropdown-item btn btn-inverse-info">
                                    Edit
                                </button>
                                </form>

                                <form method="POST" action="{{ route('hsp-delete', $hospital->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="dropdown-item btn btn-inverse-danger" onclick="return confirm('Are you sure you want to delete this HSP?')">
                                    Delete
                                </button>
                                </form>
                            </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

                    </div>
                </div>
              </div>
            </div>
          </div>


        <!-- content-wrapper ends -->

        {{-- Footer --}}
        @include('dashboard.partials.footer')
        {{-- End Footer  --}}


      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/file-upload.js') }}"></script>
  <script src="{{ asset('js/typeahead.js') }}"></script>
  <script src="{{ asset('js/select2.js') }}"></script>
  <!-- End custom js for this page-->
      {{-- Toastify  --}}
      @toastifyJs
</body>

</html>
