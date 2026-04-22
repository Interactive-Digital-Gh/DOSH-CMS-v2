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
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Homepage Sections</h4>
                      <p class="card-description">Click on a section to edit it on the right</p>
                      <div class="template-demo">
                        <a href="{{ route('home-sections.edit', 'insurance') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'insurance' ? 'btn-active' : '' }}">
                             Health Insurance
                            </button>
                        </a>

                        <a href="{{ route('home-sections.edit', 'finance') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'finance' ? 'btn-active' : '' }}">
                             Financial Insurance
                            </button>
                        </a>

                        <a href="{{ route('home-sections.edit', 'ride') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'ride' ? 'btn-active' : '' }}">
                             Ride
                            </button>
                        </a>

                        <a href="{{ route('home-sections.edit', 'erp') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'erp' ? 'btn-active' : '' }}">
                             ERP
                            </button>
                        </a>

                        <a href="{{ route('home-sections.edit', 'risk') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'risk' ? 'btn-active' : '' }}">
                             Risk
                            </button>
                        </a>

                        <a href="{{ route('home-sections.edit', 'commerce') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'commerce' ? 'btn-active' : '' }}">
                             E-Commerce
                            </button>
                        </a>
                      </div>
                    </div>
                  </div>
              </div>

            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit {{ $section }} section</h4>

                    @foreach ($homeSections as $homeSection)


                    @switch($section)
                        @case('insurance')
                            @php
                                $image = $homeSection->insurance_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->insurance_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->insurance_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->insurance_modal_body;
                            @endphp
                        @break

                        @case('finance')
                            @php
                                $image = $homeSection->finance_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->finance_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->finance_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->finance_modal_body;
                            @endphp
                        @break

                        @case('ride')
                            @php
                                $image = $homeSection->ride_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->ride_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->ride_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->ride_modal_body;
                            @endphp
                        @break

                        @case('erp')
                            @php
                                $image = $homeSection->erp_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->erp_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->erp_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->erp_modal_body;
                            @endphp
                        @break

                        @case('commerce')
                            @php
                                $image = $homeSection->commerce_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->commerce_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->commerce_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->commerce_modal_body;
                            @endphp
                        @break

                        @case('risk')
                            @php
                                $image = $homeSection->risk_image;

                                $caption = old('caption') !== null ? old('caption') : $homeSection->risk_caption;

                                $body = old('body') !== null ? old('body') : $homeSection->risk_body;

                                $modalBody = old('modal_body') !== null ? old('modal_body') : $homeSection->risk_modal_body;
                            @endphp
                        @break

                    @endswitch


                    <form class="forms-sample" method="POST"
                    action="{{ route('home-sections.update', $section) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group" style="display: flex;">
                            <label>Section Image</label>
                            <input type="file" name="home_section_image" class="file-upload-default">
                            <div class="input-group col-xs-12 col-md-8" style="height:3rem;">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                            </div>
                            <div class="col-xs-12 col-md-4 homesec-image-container">
                                <img src="{{ asset($image) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Caption</label>
                            <textarea class="form-control" id="myeditorinstance-caption" name="caption">{{ $caption }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <textarea class="form-control" id="myeditorinstance-body" name="body">{{ $body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Modal Body</label>
                            <textarea class="form-control" id="myeditorinstance-modal-body" name="modal_body">{{ $modalBody }}</textarea>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>

                    @endforeach
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
