<style>
    :root {
        --primary-color: #7B4B33;
        --secondary-color: #D4B892;
        --tertiary-color: #6C8360;
        --dark-color: #3B302B;
        --light-color: #EFE9E4;
        --background-color: #d5cbbeff;
        --card-color: #f7f0eaff;
        --nav-color: #c5a88eff;
    }

    html,
    body {
        height: 100%;
        margin: 0;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--background-color);
        color: var(--dark-color);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .navbar {
        background-color: var(--nav-color) !important;
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

    .nav-link {
        font-weight: 500;
        color: var(--dark-color) !important;
        transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary-color) !important;
    }

    h2 {
        color: white;
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

    .accordion-item {
        border: 1px solid var(--light-color);
        border-radius: 12px;
        margin-top: 10px;
    }

    .accordion-button {
        background-color: var(--background-color);
        color: var(--dark-color);
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: var(--primary-color);
        color: white;
    }

    .badge {
        font-weight: 600;
        border-radius: 50px;
        padding: 0.5em 0.8em;
    }

    .badge-seller {
        background-color: var(--secondary-color);
        color: var(--dark-color);
    }

    .badge-delivery {
        background-color: var(--tertiary-color);
        color: white;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        padding: 8px 12px;
    }


    .table thead {
        background-color: var(--primary-color);
        color: white;
    }

    .footer {
        flex-shrink: 0;
        margin-top: auto;
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