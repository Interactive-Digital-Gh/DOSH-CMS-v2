<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DOSH CMS - Forgot Password</title>
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
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->

  {{-- Toastify  --}}
  @toastifyCss
</head>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            {{ toastify()->error($error) }}
        @endforeach
    @endif

    @if(session('success'))
            {{ toastify()->success(session('success')) }}
    @endif

    @if(session('error'))
            {{ toastify()->error(session('error')) }}
    @endif

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{ asset('images/dosh_logo.png') }}" alt="logo">
              </div>
              <h4>Forgot your password?</h4>
              <h6 class="font-weight-light">Enter your email and we'll send you a reset link.</h6>
              <form class="pt-3" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-lg border-left-0" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                  </div>
                </div>
                <div class="my-3">
                    <button class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" type="submit">SEND RESET LINK</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="{{ route('login') }}" class="auth-link text-black">Back to login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->

    {{-- Toastify  --}}
    @toastifyJs
</body>

</html>
