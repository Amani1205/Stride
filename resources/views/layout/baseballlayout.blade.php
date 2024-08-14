<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stride - Baseball</title>
    @include('libraries.style')

</head>
<body>
<header>
    @include('components.navbar')
</header>

<div>
    @yield('content')
</div>

@include('components.footer')

@include('libraries.script')
</body>

</html>