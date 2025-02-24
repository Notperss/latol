<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.css') }}">

  <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('dist/assets/css/app.css') }}">
</head>

<body>
  <div id="auth">

    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
          <div class="card pt-4">
            <div class="card-body">

              <div class="text-center mb-5">
                <img src="{{ asset('dist/assets/images/favicon.svg') }}" height="48" class='mb-4'>
                <h3>Sign In</h3>
                <p>Please sign in.</p>
              </div>

              @if ($errors->has('username'))
                <p class="mb-2 text-sm text-danger">The email address or password is incorrect.</p>
              @endif

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left">
                  <label for="username">Username</label>
                  <div class="position-relative">
                    <input type="text" class="form-control" id="username" name="username">
                    <div class="form-control-icon">
                      <i data-feather="user"></i>
                    </div>
                  </div>
                </div>

                <div class="form-group position-relative has-icon-left">
                  <div class="clearfix">
                    <label for="password">Password</label>
                  </div>

                  <div class="position-relative">
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="form-control-icon">
                      <i data-feather="lock"></i>
                    </div>
                  </div>
                </div>

                <div class="clearfix">
                  <button class="btn btn-primary float-right">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="{{ asset('dist/assets/js/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('dist/assets/js/app.js') }}"></script>

  <script src="{{ asset('dist/assets/js/main.js') }}"></script>
</body>

</html>
