<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tikoem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    @include('layouts.admin.css')
</head>

<body>
    @include('layouts.admin.navbar')
    @include('layouts.admin.header')

    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer Start -->
    @include('layouts.admin.footer')
    <!-- Footer End -->

    <!-- JS Start -->
    @include('layouts.admin.js')
    <!-- JS End -->

</body>

</html>
