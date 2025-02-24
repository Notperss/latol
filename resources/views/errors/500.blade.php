<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error System</title>
  <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/bootstrap.css">

  <link rel="shortcut icon" href="{{ asset('') }}dist/assets/images/favicon.svg" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('') }}dist/assets/css/app.css">
</head>

<body>
  <div id="error">

    <div class="container text-center pt-32">
      <h1 class='error-title'>500</h1>
      <p>Error system. Please contact administrator.</p>
      <a href="{{ route('dashboard.index') }}" class='btn btn-primary'>Go Home</a>
    </div>

    <div class="footer pt-32">
      <p class="text-center">Copyright &copy; Teknologi Informasi
        <script>
          document.write(new Date().getFullYear())
        </script>
      </p>
    </div>
  </div>
</body>

</html>
