<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tikoem - Customer Dashboard</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #7B4B33;
            --secondary-color: #D4B892;
            --tertiary-color: #6C8360;
            --dark-color: #3B302B;
            --light-color: #EFE9E4;
            --background-color: #d5cbbeff;
            --card-color: #f7f0ea;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--dark-color);
            background-image: url('https://i.pinimg.com/736x/f9/fb/2f/f9fb2ffac6e09e1104e7d4057735591a.jpg');
            background-size: cover;
            background-attachment: fixed;
        }

        /* Scrollbar styling (optional) */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--background-color);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--primary-color);
            border-radius: 20px;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-[var(--card-color)] shadow-md">
        <div class="container mx-auto flex items-center justify-between px-6 py-3">
            <a href="#" class="flex items-center gap-2 font-poppins font-bold text-[var(--primary-color)]">
                <i class="fas fa-coffee fa-2x"></i>
                <div class="text-lg">
                    Tikoem
                    <small class="block text-[var(--dark-color)] font-medium text-xs">Kafe GSG</small>
                </div>
            </a>
            <ul class="flex space-x-6 font-medium text-[var(--dark-color)]">
                <li><a href="#" class="hover:text-[var(--primary-color)] transition">Menu</a></li>
                <li><a href="#" class="hover:text-[var(--primary-color)] transition">Orders</a></li>
                <li><a href="#" class="hover:text-[var(--primary-color)] transition">History</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section
        class="text-white bg-[linear-gradient(rgba(123,75,51,0.5),rgba(123,75,51,0.5)),url('https://i.pinimg.com/736x/70/b2/43/70b2430b4eae81b01749e693c16baa67.jpg')] bg-cover bg-center rounded-b-3xl py-20 text-center shadow-lg">
        <div class="container mx-auto px-6">
            <h2 class="font-poppins font-extrabold text-4xl mb-3"> Selamat datang, Customer!</h2>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-10 flex-grow">
        <!-- Combined Location + About Tikoem Section -->
        <section id="content" class="container py-5">
            <div class="bg-[var(--card-color)] rounded-2xl shadow-md p-6 flex flex-col md:flex-row gap-6">
                <!-- About Tikoem -->
                <div class="md:w-1/2">
                    <h5
                        class="text-[var(--primary-color)] font-poppins font-semibold text-xl mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i> Tentang Tikoem
                    </h5>
                    <p>
                        Tikoem adalah kedai kopi harian yang mengutamakan kenyamanan, kualitas biji kopi lokal terbaik,
                        dan suasana hangat untuk semua pelanggan setia kami. Kami berkomitmen untuk menyajikan kopi
                        dengan
                        rasa terbaik dan pelayanan yang ramah.
                    </p>
                    <a href="#"
                        class="inline-block mt-4 bg-[var(--primary-color)] hover:bg-[#643B26] text-white font-semibold py-2 px-5 rounded-xl transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>

                <!-- Small Map -->
                <div class="md:w-1/2 flex flex-col items-center justify-start">
                    <h5
                        class="text-[var(--primary-color)] font-poppins font-semibold text-xl mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt"></i> Lokasi Kami
                    </h5>
                    <p class="text-gray-600 mb-2 text-center md:text-left">Kunjungi kami di alamat:</p>
                    <address class="text-gray-600 text-center md:text-left mb-4">
                        Jl. Kopi No. 123, Jakarta<br>
                        Indonesia 10110
                    </address>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126915.123456789!2d106.7943421!3d-6.21462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1f25a123456%3A0x7c1ab345cdef7890!2sKafe%20Tikoem!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%" height="200" style="border:0; border-radius: 0.75rem;" allowfullscreen=""
                        loading="lazy" class="rounded-xl shadow-md"></iframe>
                </div>
            </div>

            <!-- Slight Menu Section (Featured Menu Preview) -->
            <div class="mt-8 bg-[var(--card-color)] rounded-2xl shadow-md p-6">
                <h5 class="font-poppins text-[var(--primary-color)] font-semibold text-xl mb-4 flex items-center gap-2">
                    <i class="fas fa-mug-hot"></i> Menu Unggulan
                </h5>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                        <img src="https://i.pinimg.com/564x/8a/3d/6b/8a3d6b9e0f6d3eb6d2ab4ef5f1c7f5f2.jpg"
                            alt="Es Kopi Susu Aren" class="w-full h-48 object-cover" />
                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <h6 class="font-semibold text-lg mb-2">Es Kopi Susu Aren</h6>
                            <p class="text-gray-600 text-sm flex-grow">Perpaduan kopi dan gula aren yang manis dan
                                segar.</p>
                            <span class="text-[var(--primary-color)] font-semibold mt-3">Rp 13.000</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                        <img src="https://tse4.mm.bing.net/th/id/OIP.QmE_piWGSVlGlBxgAAUm7QHaFj?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
                            alt="Hot Cappuccino" class="w-full h-48 object-cover" />
                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <h6 class="font-semibold text-lg mb-2"> Es Coklat </h6>
                            <p class="text-gray-600 text-sm flex-grow">Es coklat.</p>
                            <span class="text-[var(--primary-color)] font-semibold mt-3">Rp 13.000</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                        <img src="https://tse3.mm.bing.net/th/id/OIP.HC9J6ewlnags8GD7_uhqSgHaHa?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3"
                            alt="Nasi Goreng Spesial" class="w-full h-48 object-cover" />
                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <h6 class="font-semibold text-lg mb-2">Nasi Goreng Spesial</h6>
                            <p class="text-gray-600 text-sm flex-grow">Nasi goreng dengan bumbu khas dan topping
                                lengkap.</p>
                            <span class="text-[var(--primary-color)] font-semibold mt-3">Rp 30.000</span>
                        </div>
                    </div>
                </div>
                <a href="#"
                    class="inline-block mt-6 bg-[var(--primary-color)] hover:bg-[#643B26] text-white font-semibold py-2 px-5 rounded-xl transition">
                    Lihat Semua Menu
                </a>
            </div>
        </section>

        <!-- Team Section -->
        <section class="mt-10 bg-[var(--card-color)] rounded-2xl shadow-md p-6">
            <h5 class="font-poppins text-[var(--primary-color)] font-semibold text-xl mb-4 flex items-center gap-2">
                <i class="fas fa-users-cog"></i> Tim Kopi Terbaik
            </h5>
            <div class="mb-4 flex gap-4">
                <span
                    class="inline-block bg-[var(--secondary-color)] text-[var(--dark-color)] rounded-full px-3 py-1 font-semibold text-sm">
                    <i class="fas fa-cash-register mr-1"></i> Barista/Kasir
                </span>
                <span
                    class="inline-block bg-[var(--tertiary-color)] text-white rounded-full px-3 py-1 font-semibold text-sm">
                    <i class="fas fa-motorcycle mr-1"></i> Kurir
                </span>
            </div>
            <ul>
                <li
                    class="flex justify-between items-center border-b border-[var(--light-color)] py-3 last:border-none font-medium text-[var(--dark-color)]">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-user-circle fa-2x text-gray-400"></i> Rian Adi
                    </div>
                    <span
                        class="inline-block bg-[var(--secondary-color)] text-[var(--dark-color)] rounded-full px-3 py-1 font-semibold text-sm">
                        Barista
                    </span>
                </li>
                <li
                    class="flex justify-between items-center border-b border-[var(--light-color)] py-3 last:border-none font-medium text-[var(--dark-color)]">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-user-circle fa-2x text-gray-400"></i> Sinta Dewi
                    </div>
                    <span
                        class="inline-block bg-[var(--tertiary-color)] text-white rounded-full px-3 py-1 font-semibold text-sm">
                        Kurir
                    </span>
                </li>
            </ul>
            <a href="#"
                class="block mt-6 bg-[var(--primary-color)] hover:bg-[#643B26] text-white font-semibold text-center py-2 rounded-xl transition">
                Kelola Tim <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[var(--dark-color)] text-white py-8 rounded-t-3xl text-center">
        <div class="container mx-auto px-6">
            <p class="text-gray-300">&copy; 2024 Tikoem. Diracik dengan sepenuh hati.</p>
        </div>
    </footer>

    <!-- Bootstrap JS for Accordion (optional, if you want accordion functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
