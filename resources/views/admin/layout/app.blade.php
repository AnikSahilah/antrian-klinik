<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotik Sehat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --main-color: #5bc0be;
            --accent-color: #0b132b;
            --background-light: #f0f9ff;
            /* Warna biru muda yang cerah */
            --hover-color: #c8f7f7;
            /* Biru muda cerah saat hover */
            --active-color: #80e0d3;
            /* Warna biru muda lebih cerah saat aktif */
            --sidebar-bg: linear-gradient(135deg, #80e0d3, #5bc0be);
            /* Gradasi biru muda di sidebar */
            --topbar-bg: #ffffff;
            /* Latar belakang putih bersih untuk topbar */
            --border-color: #e0e0e0;
            /* Warna border yang lebih lembut */
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-light);
            display: flex;
            min-height: 100vh;
            color: var(--accent-color);
        }

        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar img {
            width: 90px;
            margin-bottom: 20px;
            background: var(--hover-color);
            padding: 10px;
            border-radius: 50%;
            border: 2px solid var(--main-color);
            transition: transform 0.3s ease;
        }

        .sidebar img:hover {
            transform: rotate(360deg);
        }

        .sidebar h4 {
            font-weight: 600;
            color: #0b132b;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.3s;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background-color: var(--hover-color);
            color: var(--main-color);
            transform: scale(1.05);
        }

        .sidebar a i {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .sidebar a:hover i {
            transform: rotate(360deg);
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: var(--background-light);
        }

        .topbar {
            background-color: var(--topbar-bg);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--border-color);
        }

        .topbar .branding {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar .branding img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .topbar .branding span {
            font-weight: 700;
            font-size: 20px;
            color: var(--main-color);
        }

        .topbar .welcome {
            font-weight: 500;
            font-size: 16px;
            color: var(--accent-color);
        }

        .content-wrapper {
            flex: 1;
            padding: 30px;
            background: var(--background-light);
        }

        .sidebar a.active {
            background-color: #e0f7fa;
            font-weight: bold;
            color: #00796b;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="https://cdn-icons-png.flaticon.com/512/4149/4149673.png" alt="Admin Avatar" class="avatar-admin">
        <h4>Admin</h4>

        <a href="/admin/dashboard">
            <i class="bi bi-house-door"></i> Dashboard
        </a>

        <a href="{{ route('jadwal.index') }}">
            <i class="bi bi-calendar-check"></i> Jadwal Antrian
        </a>

        <a href="{{ route('antrian.index') }}">
            <i class="bi bi-people-fill"></i> Antrian Pasien
        </a>

        <a href="{{ route('profile.index') }}">
            <i class="bi bi-person-circle"></i> Profil
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="branding">
                <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" alt="Apotik Logo">
                <span>BPM Lilik Susilowati</span>
            </div>
            <div class="welcome">
                Selamat Datang, <b>Admin</b>
            </div>
        </div>

        <!-- Page Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>