<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Karyawan - Tikoem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">


    @include('layouts.general.css')

    @include('layouts.general.style')
</head>

<body>
    @include('layouts.karyawan.header')

    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer Start -->
    @include('layouts.general.footer')
    <!-- Footer End -->

    <!-- Script Start -->
    @include('layouts.pelanggan.script')
    <!-- Script End -->
</body>

</html>