<style>
        :root {
            --primary-color: #7B4B33;
            --secondary-color: #D4B892;
            --tertiary-color: #6C8360;
            --dark-color: #3B302B;
            --light-color: #f5ece5;
            --background-color: rgb(250, 247, 243);
            --card-color: #f7f0eaff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--dark-color);
        }

        .navbar {
            background-color: var(--card-color) !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand .logo-text {
            margin-left: 8px;
            font-size: 1.3rem;
        }

        .hero-section {
            background-image: linear-gradient(rgba(123, 75, 51, 0.50), rgba(123, 75, 51, 0.50)),
                url('/assets/images/admin_banner.png');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            text-align: center;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .hero-section h1 {
            font-weight: 700;
            font-size: 2.8rem;
        }

        .card {
            border: none;
            border-radius: 16px;
            background-color: var(--card-color);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card .list-group-item {
            background-color: var(--card-color);
            border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .card-title {
            color: var(--primary-color);
            font-weight: 600;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            font-weight: 600;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background-color: #643B26;
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .alert-primary {
            background-color: #FFF7F3;
            color: var(--primary-color);
            border-left: 5px solid var(--primary-color);
            border-radius: 8px;
        }

        .alert-success {
            background-color: #F6F8F4;
            color: var(--tertiary-color);
            border-left: 5px solid var(--tertiary-color);
            border-radius: 8px;
        }

        .footer {
            margin-top: 60px;
            padding: 30px 0;
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .footer p {
            color: #c7c7c7;
        }
    </style>