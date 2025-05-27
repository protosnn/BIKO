<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Windmill Dashboard</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer></script>
  <script src="../assets/js/init-alpine.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    defer></script>
  <script src="../assets/js/charts-lines.js" defer></script>
  <script src="../assets/js/charts-pie.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    
    <style>
        /* Custom DataTables styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #7c3aed !important;
            border-color: #7c3aed !important;
            color: white !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #6d28d9 !important;
            border-color: #6d28d9 !important;
            color: white !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 0.375rem;
        }
        table.dataTable tbody tr {
            background-color: transparent;
        }
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            padding: 0.5rem;
        }
    </style>
</head>

<body>
  <div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <?php include 'sidebar_siswa.php'; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- Header -->
      <?php include 'header_siswa.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard Siswa
          </h2>
          <!-- CTA -->
          <a
            class="flex items-center justify-between p-4 mb-4 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green"
            href="#">
            <div class="flex items-center">
              <svg
                class="w-5 h-5 mr-2"
                fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
              </svg>
              <span>Selamat Datang Mas Murid</span>
            </div>
          </a>
          <!-- Cards -->
          <div class="grid gap-35 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="group relative h-96 w-72 [perspective:1000px]">
              <div
                class="absolute duration-1000 w-full h-full [transform-style:preserve-3d] group-hover:[transform:rotateX(180deg)]"
              >
                <div
                  class="absolute w-full h-full rounded-xl bg-red-500 p-6 text-white [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <div class="flex justify-between items-start">
                      <div class="text-3xl font-bold">Pelanggaran</div>
                      <div class="text-5xl">🙅🏻‍♂️</div>
                    </div>
                    <div class="mt-4">
                      <p class="text-lg">
                        Total Pelanggaran yang sudah kamu buat <br>
                        <p class="text-gray-200 text-sm">
                        <i>Jangan pernah mengulanginya lagi <b>🫵🏻</b></i>
                        </p>
                      </p>
                    </div>
                    <div class="mt-auto">
                      <p class="text-sm opacity-75">Hover to flip!</p>
                    </div>
                  </div>
                </div>

                <div
                  class="absolute w-full h-full rounded-xl bg-red-500 p-6 text-white [transform:rotateX(180deg)] [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <h1 class="text-2xl oldstyle-nums  text-center py-35 font-black mb-4"><b>120</b></h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->
           <div class="group relative h-96 w-72 [perspective:1000px]">
              <div
                class="absolute duration-1000 w-full h-full [transform-style:preserve-3d] group-hover:[transform:rotateX(180deg)]"
              >
                <div
                  class="absolute w-full h-full rounded-xl bg-yellow-500 p-6 text-white [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <div class="flex justify-between items-start">
                      <div class="text-3xl font-bold">Konsultasi</div>
                      <div class="text-5xl">✒️</div>
                    </div>
                    <div class="mt-4">
                      <p class="text-lg">
                        Total konsultasi kamu dengan bapak/ibu konseler yang sudah kamu buat <br>
                        <p class="text-gray-200 text-sm">
                        <i>Kalau ada apa-apa jangan sungkan buat cerita ya 🫶🏼</i>
                        </p>
                      </p>
                    </div>
                    <div class="mt-auto">
                      <p class="text-sm opacity-75">Hover to flip!</p>
                    </div>
                  </div>
                </div>

                <div
                  class="absolute w-full h-full rounded-xl bg-yellow-500 p-6 text-white [transform:rotateX(180deg)] [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <h1 class="text-2xl oldstyle-nums  text-center py-35 font-black mb-4"><b>120</b></h1>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="group relative h-96 w-72 [perspective:1000px]">
              <div
                class="absolute duration-1000 w-full h-full [transform-style:preserve-3d] group-hover:[transform:rotateX(180deg)]"
              >
                <div
                  class="absolute w-full h-full rounded-xl bg-green-500 p-6 text-white [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <div class="flex justify-between items-start">
                      <div class="text-3xl font-bold">Laporan</div>
                      <div class="text-5xl">🗣</div>
                    </div>
                    <div class="mt-4">
                      <p class="text-lg">
                        Total Pelanggaran siswa lain yang sudah kamu laporkan ke para bapak/ibu konseler <br>
                        <p class="text-gray-200 text-sm">
                        <i>Jangan pernah takut buat ngelaporin pelangaaran yang udah dilakukan oleh temen-temen👏🏼</i>
                        </p>
                      </p>
                    </div>
                    <div class="mt-auto">
                      <p class="text-sm opacity-75">Hover to flip!</p>
                    </div>
                  </div>
                </div>

                <div
                  class="absolute w-full h-full rounded-xl bg-green-500 p-6 text-white [transform:rotateX(180deg)] [backface-visibility:hidden]"
                >
                  <div class="flex flex-col h-full">
                    <h1 class="text-2xl oldstyle-nums  text-center py-35 font-black mb-4"><b>120</b></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Cards -->
           <!-- Section Motiivasi -->
            <h1 class="text-2xl text-white font-semibold ">Motivasi</h1>
          <div
            class="flex flex-col gap-2 dark:text-white  w-full bg-white dark:bg-neutral-900 p-5 rounded-md mt-2 shadow-md mb-8"
            >
            <div class="flex flex-row justify-between w-full">
              <div class="flex flex-row justify-between w-full">
                <div
                  class="bg-gray-200 dark:bg-neutral-700 rounded-md w-20 h-4 animate-pulse"
                ></div>
                <div
                  class="bg-gray-200 dark:bg-neutral-700 rounded-md w-10 animate-pulse"
                ></div>
              </div>
            </div>
            <div class="flex flex-row justify-between w-full">
              <div
                class="bg-gray-200 dark:bg-neutral-700 rounded-md w-40 animate-pulse"
              ></div>

              <div class="text-xs">
                <div class="flex flex-row">
                  <svg
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-4 w-4 text-yellow-400"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1.5 1.5 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"
                    ></path>
                  </svg>
                  <svg
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-4 w-4 text-yellow-400"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1.5 1.5 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"
                    ></path>
                  </svg>
                  <svg
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-4 w-4 text-yellow-400"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1.5 1.5 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"
                    ></path>
                  </svg>
                  <svg
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-4 w-4 text-yellow-400"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1 1 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"
                    ></path>
                  </svg>

                  <svg
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    class="h-4 w-4 text-yellow-200"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1.5 1.5 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"
                    ></path>
                  </svg>
                </div>
              </div>
            </div>

            <div
              class="bg-gray-200 dark:bg-neutral-700 rounded-md w-full h-20 animate-pulse"
            ></div>
          </div>
          <!-- End Section Motiivasi -->
  