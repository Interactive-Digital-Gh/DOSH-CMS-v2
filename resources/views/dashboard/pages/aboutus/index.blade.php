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
                      <h4 class="card-title">About Us Sections</h4>
                      <p class="card-description">Click on a section to edit it on the right</p>
                      <div class="template-demo">
                        <a href="{{ route('aboutus-sections.edit', 'header') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'header' ? 'btn-active' : '' }}">
                             Header Image
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'whoweare') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'whoweare' ? 'btn-active' : '' }}">
                             Who We Are
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'mission') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'mission' ? 'btn-active' : '' }}">
                             Mission
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'values') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'values' ? 'btn-active' : '' }}">
                             Core Values
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'expertise') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'expertise' ? 'btn-active' : '' }}">
                             Expertise
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'inspiration') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'inspiration' ? 'btn-active' : '' }}">
                             Inspiration
                            </button>
                        </a>
                        <a href="{{ route('aboutus-sections.edit', 'banner') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ $section == 'banner' ? 'btn-active' : '' }}">
                             Banner
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

                    @foreach ($aboutUsSections as $aboutUsSection)


                    @switch($section)
                        @case('header')
                            @php
                                $image = $aboutUsSection->aboutus_header_image;
                            @endphp
                        @break

                        @case('whoweare')
                            @php
                                $who_we_are_header = True;
                                $image = $aboutUsSection->who_we_are_image;

                                $caption = old('caption') !== null ? old('caption') : $aboutUsSection->who_we_are_caption;

                                $header = old('header') !== null ? old('header') : $aboutUsSection->who_we_are_header;

                                $body = old('body') !== null ? old('body') : $aboutUsSection->who_we_are_body;
                            @endphp
                        @break

                        @case('mission')
                            @php
                                $image = $aboutUsSection->mission_image;

                                $caption = old('caption') !== null ? old('caption') : $aboutUsSection->mission_caption;

                                $body = old('body') !== null ? old('body') : $aboutUsSection->mission_body;
                            @endphp
                        @break

                        @case('values')
                            @php
                                $image = $aboutUsSection->values_image;

                                $caption = old('caption') !== null ? old('caption') : $aboutUsSection->values_caption;

                                $body = old('body') !== null ? old('body') : $aboutUsSection->values_body;
                            @endphp
                        @break

                        @case('expertise')
                            @php
                                $caption = old('caption') !== null ? old('caption') : $aboutUsSection->expertise_caption;

                                $body = old('body') !== null ? old('body') : $aboutUsSection->expertise_body;
                            @endphp
                        @break

                        @case('inspiration')
                            @php
                                $caption = old('caption') !== null ? old('caption') : $aboutUsSection->inspiration_caption;

                                $body = old('body') !== null ? old('body') : $aboutUsSection->inspiration_body;
                            @endphp
                        @break

                        @case('banner')
                        @php
                                $image = $aboutUsSection->banner_image;
                        @endphp
                    @break

                    @endswitch


                    <form class="forms-sample" method="POST"
                    action="{{ route('aboutus-sections.update', $section) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if (isset($image))
                        <div class="form-group" style="display: flex;">
                            <label>Section Image</label>
                            <input type="file" name="aboutus_section_image" class="file-upload-default">
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
                    @endif


                    @if (isset($body))
                        <div class="form-group">
                            <label for="exampleInputUsername1">Caption</label>
                            <textarea class="form-control" id="myeditorinstance-caption" name="caption">{{ $caption }}</textarea>
                        </div>
                        @if (isset($who_we_are_header))
                        <div class="form-group">
                            <label for="exampleInputUsername1">Header</label>
                            <textarea class="form-control" id="myeditorinstance-caption" name="header">{{ $header }}</textarea>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <textarea class="form-control" id="myeditorinstance-body" name="body">{{ $body }}</textarea>
                        </div>
                    @endif

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
