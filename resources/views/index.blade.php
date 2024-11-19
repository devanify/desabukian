<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Desa Bukian</title>
  <link rel="icon" href="{{ asset('assets/image/favico/favicon.ico') }}" type="image/x-icon">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  {{-- <script src="./node_modules/preline/dist/preline.js"></script> --}}
</head>
<body>
@include('partials.header')
@include('partials.hero')
@include('partials.team')
@include('partials.tentang')
@include('partials.visimisi')
@include('partials.maps')
@include('partials.youtube')
{{-- @include('partials.blog') --}}
@include('partials.footer3')
</body>
</html>