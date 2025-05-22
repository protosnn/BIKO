<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIKOO - Bimbingan Konseling Online</title>
    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body { background: #f6f5fa; }
      .bg-primary { background-color: #7c3aed; }
      .text-primary { color: #7c3aed; }
      .btn-primary { background-color: #7c3aed; color: #fff; }
      .btn-primary:hover { background-color: #6d28d9; color: #fff; }
      .btn-outline.btn-primary { border-color: #7c3aed; color: #7c3aed; }
      .btn-outline.btn-primary:hover { background: #ede9fe; color: #6d28d9; }
      .section-title { color: #7c3aed; }
      .card { border-top: 4px solid #7c3aed; }
      .scrollbar-thumb-primary { background: #a78bfa; }
      .scrollbar-track-primary { background: #ede9fe; }
      .footer-bg { background: #4c1d95; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="navbar bg-primary shadow sticky top-0 z-50">
      <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <div class="flex items-center gap-2">
          <img src="assets/img/dashboard.png" alt="BIKOO Logo" class="h-8 w-8">
          <span class="font-bold text-xl text-white">BIKOO</span>
        </div>
        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button id="nav-toggle" class="btn btn-ghost text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
        <!-- Menu -->
        <div id="nav-menu" class="hidden md:flex flex-col md:flex-row md:items-center md:gap-0 gap-2 md:gap-4 absolute md:static top-full left-0 w-full md:w-auto bg-primary md:bg-transparent shadow md:shadow-none px-6 md:px-0 py-4 md:py-0">
          <a href="#fitur" class="menu-link btn btn-ghost normal-case text-base text-white hover:bg-purple-800 w-full md:w-auto">Fitur</a>
          <a href="#manfaat" class="menu-link btn btn-ghost normal-case text-base text-white hover:bg-purple-800 w-full md:w-auto">Manfaat</a>
          <a href="#guru" class="menu-link btn btn-ghost normal-case text-base text-white hover:bg-purple-800 w-full md:w-auto">Guru BK</a>
          <a href="#kontak" class="menu-link btn btn-ghost normal-case text-base text-white hover:bg-purple-800 w-full md:w-auto">Kontak</a>
          <button class="relative px-6 py-3 overflow-hidden font-medium transition-all bg-purple-500 rounded-md group w-full md:w-auto mt-2 md:mt-0">
            <span class="absolute top-0 right-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-purple-800 rounded group-hover:-mr-4 group-hover:-mt-4">
              <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
            </span>
            <span class="absolute bottom-0 rotate-180 left-0 inline-block w-4 h-4 transition-all duration-500 ease-in-out bg-purple-800 rounded group-hover:-ml-4 group-hover:-mb-4">
              <span class="absolute top-0 right-0 w-5 h-5 rotate-45 translate-x-1/2 -translate-y-1/2 bg-white"></span>
            </span>
            <span class="absolute bottom-0 left-0 w-full h-full transition-all duration-500 ease-in-out delay-200 -translate-x-full bg-purple-600 rounded-md group-hover:translate-x-0"></span>
            <span class="relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-white">
              <a href="login.php"> Get Started</a>
            </span>
          </button>
        </div>
      </div>
    </nav>
    <script>
      // Navbar responsive toggle
      const navToggle = document.getElementById('nav-toggle');
      const navMenu = document.getElementById('nav-menu');
      const menuLinks = document.querySelectorAll('#nav-menu .menu-link');
      function setMenuMobile(showOnlyGetStarted) {
        menuLinks.forEach(link => {
          if (showOnlyGetStarted) {
            link.classList.add('hidden');
          } else {
            link.classList.remove('hidden');
          }
        });
      }
      navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
        // Jika di mobile, hanya tampilkan Get Started
        if (window.innerWidth < 768) {
          setMenuMobile(!navMenu.classList.contains('hidden'));
        }
      });
      // Reset menu saat resize ke desktop
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
          navMenu.classList.remove('hidden');
          setMenuMobile(false);
        } else {
          navMenu.classList.add('hidden');
          setMenuMobile(false);
        }
      });
    </script>
    <!-- Hero Section -->
    <section class="hero min-h-[60vh] bg-gradient-to-br from-purple-100 to-primary/20 flex items-center" id="hero">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-12 gap-8">
            <div class="max-w-xl">
                <h1 class="text-4xl md:text-5xl font-extrabold text-purple-800 mb-4">Selamat Datang di BIKOO</h1>
                <p class="text-lg text-gray-700 mb-6">Aplikasi Bimbingan Konseling Online yang membantu siswa, guru, dan orang tua dalam memantau, melaporkan, dan menyelesaikan permasalahan di sekolah secara mudah dan terintegrasi.</p>
                <div class="flex gap-4">
                    <a href="login.php" class="btn btn-primary p-4 rounded">Mulai Sekarang</a>
                    <a href="#fitur" class="btn p-4 rounded btn-primary">Lihat Fitur</a>
                </div>
            </div>
            <img src="assets/img/dashboard.png" alt="Dashboard BIKOO" class="w-80 rounded-lg shadow-lg hidden md:block">
        </div>
    </section>
    <!-- Fitur Section -->
    <section id="fitur" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center section-title mb-10">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-base-100 shadow-md p-6">
                    <img src="assets/img/login-office.jpeg" alt="Login" class="w-full h-32 object-cover rounded mb-4">
                    <h3 class="font-semibold text-lg mb-2">Login Multi-Role</h3>
                    <p class="text-gray-600">Akses khusus untuk siswa, guru, dan admin dengan fitur sesuai kebutuhan masing-masing.</p>
                </div>
                <div class="card bg-base-100 shadow-md p-6">
                    <img src="assets/img/dashboard.png" alt="Dashboard" class="w-full h-32 object-cover rounded mb-4">
                    <h3 class="font-semibold text-lg mb-2">Dashboard Interaktif</h3>
                    <p class="text-gray-600">Pantau data pelanggaran, konsultasi, dan statistik secara real-time dengan tampilan yang mudah dipahami.</p>
                </div>
                <div class="card bg-base-100 shadow-md p-6">
                    <img src="assets/img/create-account-office.jpeg" alt="Konsultasi" class="w-full h-32 object-cover rounded mb-4">
                    <h3 class="font-semibold text-lg mb-2">Konsultasi Online</h3>
                    <p class="text-gray-600">Fasilitasi konsultasi antara siswa dan guru BK secara online, aman, dan terjadwal.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Manfaat Section -->
    <section id="manfaat" class="py-16 bg-purple-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center section-title mb-10">Manfaat Penggunaan BIKOO</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card bg-base-100 shadow p-6">
                    <h3 class="font-semibold text-lg mb-2 text-primary">Transparansi Data</h3>
                    <p class="text-gray-600">Semua data pelanggaran dan konsultasi tercatat rapi dan dapat diakses kapan saja.</p>
                </div>
                <div class="card bg-base-100 shadow p-6">
                    <h3 class="font-semibold text-lg mb-2 text-primary">Kolaborasi Mudah</h3>
                    <p class="text-gray-600">Memudahkan komunikasi antara siswa, guru, dan orang tua dalam menyelesaikan masalah.</p>
                </div>
                <div class="card bg-base-100 shadow p-6">
                    <h3 class="font-semibold text-lg mb-2 text-primary">Efisiensi Waktu</h3>
                    <p class="text-gray-600">Proses pelaporan dan konsultasi lebih cepat tanpa harus bertatap muka langsung.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel Guru Section -->
    <section id="guru" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center section-title mb-10">Guru Bimbingan Konseling</h2>
            <div class="flex bg-white gap-8 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-primary scrollbar-track-primary">
                <div class="min-w-[220px] flex flex-col items-center bg-base-100 shadow-md rounded-lg p-6 card">
                    <img src="assets/img/create-account-office.jpeg" class="w-32 h-32 object-cover rounded-full mb-4" alt="Guru 1" />
                    <h3 class="text-lg font-semibold text-center">Ibu Siti Aminah, S.Pd</h3>
                </div>
                <div class="min-w-[220px] flex flex-col items-center bg-base-100 shadow-md rounded-lg p-6 card">
                    <img src="assets/img/create-account-office-dark.jpeg" class="w-32 h-32 object-cover rounded-full mb-4" alt="Guru 2" />
                    <h3 class="text-lg font-semibold text-center">Bapak Budi Santoso, M.Pd</h3>
                </div>
                <div class="min-w-[220px] flex flex-col items-center bg-base-100 shadow-md rounded-lg p-6 card">
                    <img src="assets/img/login-office-dark.jpeg" class="w-32 h-32 object-cover rounded-full mb-4" alt="Guru 3" />
                    <h3 class="text-lg font-semibold text-center">Ibu Dewi Lestari, S.Psi</h3>
                </div>
                <div class="min-w-[220px] flex flex-col items-center bg-base-100 shadow-md rounded-lg p-6 card">
                    <img src="assets/img/login-office-dark.jpeg" class="w-32 h-32 object-cover rounded-full mb-4" alt="Guru 3" />
                    <h3 class="text-lg font-semibold text-center">Ibu Dewi Lestari, S.Psi</h3>
                </div>
                <div class="min-w-[220px] flex flex-col items-center bg-base-100 shadow-md rounded-lg p-6 card">
                    <img src="assets/img/login-office-dark.jpeg" class="w-32 h-32 object-cover rounded-full mb-4" alt="Guru 3" />
                    <h3 class="text-lg font-semibold text-center">Ibu Dewi Lestari, S.Psi</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer id="kontak" class="footer-bg text-white py-8 mt-12">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h3 class="font-bold text-lg mb-2">Contact Person</h3>
                <p>Email: <a href="mailto:info@bikoo.com" class="underline">info@bikoo.com</a></p>
                <p>Telp: <a href="tel:+6281234567890" class="underline">+62 812-3456-7890</a></p>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-2">Media Sosial</h3>
                <div class="gap-4">
                    <a href="#" class="btn btn-circle btn-outline btn-sm border-white"><img src="assets/img/twitter.svg" alt="Twitter" class="w-5 h-5"></a>
                    <a href="#" class="btn btn-circle btn-outline btn-sm border-white"><img src="assets/img/github.svg" alt="GitHub" class="w-5 h-5"></a>
                </div>
            </div>
            <div class="text-sm mt-4 md:mt-0">&copy; 2025 BIKOO. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
