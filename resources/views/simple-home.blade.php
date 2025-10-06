<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION[$username] = hash('sha256', $password); 
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Daftar Akun </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --color-coffee: #7B4B33;
            --color-chocolate: #5A3A2C;
            --color-cream: #EFE9E4;
            --color-caramel: #D4B892;
            --color-danger: #e3342f;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-cream);
            color: var(--color-chocolate);
            background-image: url('https://i.pinimg.com/736x/57/19/31/57193110209ccde092dd7e46cb5b5ce7.jpg'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .signup-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
            max-width: 480px;
            width: 90%;
            padding: 2.5rem;
        }

        .form-control {
            border-color: var(--color-caramel) !important;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--color-coffee) !important;
            box-shadow: 0 0 0 3px rgba(123, 75, 51, 0.2) !important;
        }

        .btn-primary {
            background-color: var(--color-coffee) !important;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--color-chocolate) !important;
        }

        .alert-danger {
            background-color: #fcebeb;
            color: var(--color-danger);
            border-left: 4px solid var(--color-danger);
        }
    </style>
</head>

<body>
    <div class="signup-card">
        <h2 class="text-3xl font-bold text-center mb-2" style="color: var(--color-chocolate);">
            Order At Tikoem!
        </h2>

        <br>

        @if ($errors->any())
            <div class="alert alert-danger p-3 mb-4 rounded-lg">
                <ul class="list-disc ml-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/auth/signup" method="POST">
            @csrf 

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-1" style="color: var(--color-chocolate);">
                    <i class="fas fa-user-circle mr-2"></i>Nama Lengkap
                </label>
                <input type="text" class="form-control w-full p-3 border rounded-lg focus:outline-none" 
                       name="name" id="name" required value="{{old('name')}}" 
                       style="border-width: 2px;">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium mb-1" style="color: var(--color-chocolate);">
                    <i class="fas fa-envelope mr-2"></i>Alamat Email
                </label>
                <input type="email" class="form-control w-full p-3 border rounded-lg focus:outline-none" 
                       name="email" id="email" required value="{{old('email')}}" 
                       style="border-width: 2px;">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium mb-1" style="color: var(--color-chocolate);">
                    <i class="fas fa-lock mr-2"></i>Kata Sandi
                </label>
                <input type="password" class="form-control w-full p-3 border rounded-lg focus:outline-none" 
                       name="password" id="password" required 
                       style="border-width: 2px;">
            </div>

            <button type="submit" class="btn btn-primary w-full text-white font-semibold py-3 rounded-lg text-lg"> 
                <i class="fas fa-coffee mr-2"></i>Daftar Sekarang
            </button>
        </form>

        <p class="text-center text-xs mt-4" style="color: var(--color-chocolate);">
            Sudah punya akun? 
            <a href="/auth" class="font-semibold underline" style="color: var(--color-coffee);">Login di sini.</a>
        </p>
    </div>
</body>

</html>