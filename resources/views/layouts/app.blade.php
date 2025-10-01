<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Default Title' ?></title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEiS5VWUSR90feRpok6cYctnYmDr5pNiyt2bRjxh0JmhjY6hw+ALEWIH" 
        crossorigin="anonymous">
</head>
<body>
    @yield('content')
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Yf0TY31HB60NNkmXc5s9fDVZLESAAA55NDz0xhy9GkCds1k1EN7N6JiEHz" 
        crossorigin="anonymous">
    </script>
</body>
</html>