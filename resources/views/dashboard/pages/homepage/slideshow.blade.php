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
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="title-row" style="display: inline-flex; width: 100%;">
                        <h4 class="card-title">{{ Route::currentRouteNamed('slideshow.edit') ? 'Update Slideshow' : 'Add New Slideshow' }}</h4>
                    @if (Route::currentRouteNamed('slideshow.edit'))
                    <a href="{{ route('slideshow.create') }}">
                    <button style="margin-left: 18rem; margin-top: -12px;" type="button" class="btn btn-primary">Create Slider</button>
                    </a>
                    @endif
                    </div>


                    {{-- route('slideshow.update', ['id', $slide->id]) --}}


                    <form class="forms-sample" method="POST"
                    action="{{ Route::currentRouteNamed('slideshow.edit') ? '/slideshow/'.$slide->id : route('slideshow.store') }}"
                    enctype="multipart/form-data">

                    @csrf
                    @if (Route::currentRouteNamed('slideshow.edit'))
                        @method('PUT')
                    @else
                        @method('POST')
                    @endif




                        <div class="form-group">
                            <label>Slideshow Image</label>
                            <input type="file" name="slideshow_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mobile Slideshow Image</label>
                            <input type="file" name="mobile_slideshow_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Caption</label>
                            <textarea class="form-control" id="myeditorinstance-caption" name="caption">{{ Route::currentRouteNamed('slideshow.edit') ? $slide->caption : old('caption') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <textarea class="form-control" id="myeditorinstance-body" name="body">{{ Route::currentRouteNamed('slideshow.edit') ? $slide->body : old('body') }}</textarea>
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>

                  </div>
                </div>
              </div>

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Sliders</h4>
                    <p class="card-description">
                      All currently published sliders on the homepage
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Preview</th>
                            <th>Publish</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($sliders as $slider)

                          <tr>
                            <td class="py-1">
                              <img src="{{ asset($slider->slideshow_image) }}" alt="image"/>
                            </td>
                            <td>
                                <a href="{{ route('preview') }}">
                                <button type="button" class="btn btn-inverse-success btn-fw">Preview</button>
                                </a>
                            </td>
                            <td>
                                @if ($slider->published == 0)
                                    <form method="POST" action="{{ route('publish-slider', ['id'=>$slider->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" name="publish" value="1" class="btn btn-inverse-success btn-fw">Publish</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('publish-slider', ['id'=>$slider->id]) }}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" name="publish" value="0"  class="btn btn-inverse-danger btn-fw">Unpublish</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($slider->published == 0)
                                    <label class="badge badge-danger">Unpublished</label>
                                @else
                                    <label class="badge badge-success">Published</label>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-inverse-dark btn-icon" data-toggle="dropdown">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item">
                                        <form method="POST" action="/slideshow/{{ $slider->id }}/edit">
                                            @csrf
                                            @method('GET')
                                        <button type="submit" class="btn btn-inverse-info ">
                                            Edit
                                        </button>
                                        </form>
                                      </a>

                                      <a class="dropdown-item">
                                        <form method="POST" action="/slideshow/{{ $slider->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-inverse-danger">
                                                Delete
                                            </button>
                                        </form>
                                      </a>
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
