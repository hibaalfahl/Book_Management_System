<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        @include('partials.navigation')

        <div class="d-flex flex-column w-100 min-vh-100">
            @include('partials.header')

            <main class="p-4 flex-grow-1">
                @yield('content')
            </main>

            @include('partials.footer')
        </div>
    </div>
</body>
</html>