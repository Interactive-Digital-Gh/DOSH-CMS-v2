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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="title-row" style="display: inline-flex; width: 100%;">
                        <h4 class="card-title">DOSH Products & Services</h4>
                    </div>
                    <div class="pns-row">
                        <a href="{{ route('pns-section', 'insurance') }}/?type=insurance"><button type="button" class="btn btn-primary btn-lg {{ request('type') == 'insurance' || !request('type') ? 'btn-active' : ''}}"> Health</button></a>

                        <a href="{{ route('pns-section', 'financial') }}/?type=financial"><button type="button" class="btn btn-primary btn-lg {{ request('type') == 'financial' ? 'btn-active' : ''}}">Financial</button></a>

                        <a href="{{ route('pns-section', 'risk') }}/?type=risk"><button type="button" class="btn btn-primary btn-lg {{ request('type') == 'risk' ? 'btn-active' : ''}}">Risk</button></a>

                        <a href="#"><button disabled type="button" class="btn btn-primary btn-lg">Ride</button></a>

                        <a href="#"><button disabled type="button" class="btn btn-primary btn-lg">ERP</button></a>

                        <a href="#"><button disabled type="button" class="btn btn-primary btn-lg">Commerce</button></a>

                        {{-- <form method="POST" action="{{ route('submit-pns-header') }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary btn-lg submit-btn">Submit Header</button>
                        </form> --}}
                    </div>
                  </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Insurance Types Sections</h4>
                      <p class="card-description">Click on a section to edit it on the right</p>
                      <div class="template-demo">
                        @if (request('type') == 'insurance' || !request('type'))
                            <a href="{{ route('pns-section', ['name' => 'insurance']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'insurance' ? 'btn-active' : '' }}">
                                Insurance Section
                                </button>
                            </a>

                            <a href="{{ route('pns-section', ['name' => 'readmore', 'type' => 'insurance']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'readmore' ? 'btn-active' : '' }}">
                                Read  More Modal
                                </button>
                            </a>


                            <a href="{{ route('pns-section', ['name' => '365'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '365' ? 'btn-active' : '' }}">
                                365 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '750']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '750' ? 'btn-active' : '' }}">
                                750 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '1000']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '1000' ? 'btn-active' : '' }}">
                                1000 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '2500']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '2500' ? 'btn-active' : '' }}">
                                2500 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '5000']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '5000' ? 'btn-active' : '' }}">
                                5000 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '10000'])}}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '10000' ? 'btn-active' : '' }}">
                                10000 - Standard
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '500'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '500' ? 'btn-active' : '' }}">
                                500 - Enhanced
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '900'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '900' ? 'btn-active' : '' }}">
                                900 - Enhanced
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '1200'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '1200' ? 'btn-active' : '' }}">
                                1200 - Enhanced
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '2800'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '2800' ? 'btn-active' : '' }}">
                                2800 - Enhanced
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '5500'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '5500' ? 'btn-active' : '' }}">
                                5500 - Enhanced
                                </button>
                            </a>
                            <a href="{{ route('pns-section', ['name' => '11000'])  }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == '11000' ? 'btn-active' : '' }}">
                                11000 - Enhanced
                                </button>
                            </a>

                        @elseif (request('type') == 'financial')

                            <a href="{{ route('pns-section', 'financial') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'financial' ? 'btn-active' : '' }}">
                                Financial Section
                                </button>
                            </a>

                            <a href="{{ route('pns-section', ['name' => 'readmore', 'type' => 'financial']) }}">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'readmore' ? 'btn-active' : '' }}">
                                Read  More Modal
                                </button>
                            </a>

                            <a href="{{ route('pns-section', 'individual') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'individual' ? 'btn-active' : '' }}">
                                Individual - Personal
                                </button>
                            </a>
                            <a href="{{ route('pns-section', 'family') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'family' ? 'btn-active' : '' }}">
                                Family - Personal
                                </button>
                            </a>
                            <a href="{{ route('pns-section', 'soho') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'soho' ? 'btn-active' : '' }}">
                                SOHO - Business
                                </button>
                            </a>
                            <a href="{{ route('pns-section', 'smb') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'smb' ? 'btn-active' : '' }}">
                                SMB - Business
                                </button>
                            </a>
                            <a href="{{ route('pns-section', 'enterprise') }}/?type=financial">
                                <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'enterprise' ? 'btn-active' : '' }}">
                                Enterprise - Business
                                </button>
                            </a>



                        @elseif (request('type') == 'risk')

                        <a href="{{ route('pns-section', 'risk') }}/?type=risk">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'risk' ? 'btn-active' : '' }}">
                            Risk Section
                            </button>
                        </a>

                        <a href="{{ route('pns-section', ['name' => 'readmore', 'type' => 'risk']) }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block {{ request('name') == 'readmore' ? 'btn-active' : '' }}">
                            Read  More Modal
                            </button>
                        </a>


                        @endif

                      </div>
                    </div>
                  </div>
              </div>

            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if (request('name') == 'readmore')
                    <h4 class="card-title">Edit Read More Modal</h4>
                    @else
                    <h4 class="card-title">Edit  section</h4>
                    @endif




                    <form class="forms-sample" method="POST"
                    action="{{ route('pns-sections-update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @if (request('name') == 'insurance' || request('name') == 'financial' || request('name') == 'risk')


                    <div class="form-group" style="display: flex;">
                        <label>Section Image</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12 col-md-8" style="height:3rem;">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                        <div class="col-xs-12 col-md-4 homesec-image-container">
                            <img src="{{ asset($pns_page->home_image) }}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Caption</label>
                        <textarea class="form-control" id="myeditorinstance-caption" name="caption" required>{{ $pns_page->home_caption }}</textarea>
                    </div>

                    <input type="text" name="type" value="{{ request('type') }}" hidden>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Body</label>
                        <textarea class="form-control" id="myeditorinstance-body" name="body" required>{{ $pns_page->home_body }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="{{ request('name') }}">Submit</button>

                    @elseif (request('name') == 'readmore')

                    <div class="form-group" style="display: flex;">
                        <label>Modal Image</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12 col-md-8" style="height:3rem;">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                        <div class="col-xs-12 col-md-4 homesec-image-container">
                            <img src="{{ asset($pns_page->image) }}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="myeditorinstance-modal-body" name="description" required>{{ $pns_page->description }}</textarea>
                    </div>

                    <input type="text" name="type" value="{{ request('type') }}" hidden>

                    <div class="form-group">
                        <label for="exampleInputEmail1">References</label>
                        <textarea class="form-control" id="myeditorinstance-modal-body" name="references" required>{{ $pns_page->references }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="{{ request('name') }}">Submit</button>

                    @else

                    <div class="form-group" style="display: flex;">
                        <label>Section Image</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12 col-md-8" style="height:3rem;">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                        <div class="col-xs-12 col-md-4 homesec-image-container">
                            <img src="{{ asset($pns_page[0]->image) }}" alt="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <textarea class="form-control" id="myeditorinstance-body" name="body" required>{{ $pns_page[0]->desc }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" value="{{ request('name') }}">Submit</button>

                    @endif





                      <button class="btn btn-light">Cancel</button>
                    </form>

                    {{-- @endforeach --}}
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
