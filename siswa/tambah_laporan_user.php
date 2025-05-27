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
</head>

<body>
  <div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop & Mobile sidebar -->
    <?php include 'sidebar_siswa.php'; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- Header -->
      <?php include 'header_siswa.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <!-- Hero Section -->
          <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
               Halaman pelaporan pelanggaran siswa
            </h2>
            <div class="relative bg-gradient-to-r from-red-600 to-red-800 text-white rounded-lg p-6 overflow-hidden">
              
              <!-- Content -->
              <div class="relative z-10 md:flex items-center justify-between">
                <div class="md:w-2/3 mb-6 md:mb-0">
                  <h3 class="text-2xl font-bold mb-2">Laporkan Pelanggaran Tata Tertib</h3>
                  <p class="text-purple-100 mb-4">
                    Bantu kami menjaga ketertiban sekolah dengan melaporkan pelanggaran yang terjadi. 
                    Setiap laporan akan ditangani dengan bijak dan rahasia pelapor akan dijaga.
                  </p>
                  <div class="flex flex-wrap gap-4 text-sm">
                    <div class="flex items-center">
                      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                      </svg>
                      Identitas Terjaga
                    </div>
                    <div class="flex items-center">
                      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                      </svg>
                      Proses Cepat
                    </div>
                    <div class="flex items-center">
                      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                      </svg>
                      Kerahasiaan Terjamin
                    </div>
                  </div>
                </div>
                <div class="md:w-1/3 flex justify-center">
                  <img src="../assets/img/pelanggaran.jpg" alt="Pelaporan" class="w-40 h-40 object-contain">
                </div>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="gap-6 mb-8 "> 
          <div>
            <div
              class="w-full px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <!-- From Uiverse.io by Javierrocadev --> 
              <div
                class="relative rounded-lg w-full mb-2 -skew-x-6 -translate-y-2 -translate-y-6 hover:-translate-y-1 hover:-translate-x-0 hover:skew-x-0 duration-500 w-72 h-44 p-2 bg-neutral-50 card-compact hover:bg-base-200 transition-all duration-200 [box-shadow:12px_12px] hover:[box-shadow:4px_4px]"
              >
                <figure class="w-full h-full">
                  <div
                    alt="change to a img tag"
                    class="bg-red-800 text-neutral-50 min-h-full rounded-lg border border-opacity-5"
                  ></div>
                </figure>
                <div class="absolute text-neutral-50 bottom-4 left-0 px-4">
                  <span class="font-bold">Laporkan pelanggaran!!</span>
                  <p class="text-sm opacity-60 line-clamp-2">
                    Halaman ini diperiuntukan untuk 
                    melaporkan pelanggaran yang dilakukan oleh siswa.
                    <b><i class="font-xl">Jangan ragu untuk melaporkan
                      pelanggaran yang sudah di lakukan
                    </i></b>
                </p>
                </div>
              </div>


              <p class="text-gray-600 dark:text-gray-400">
               <b> <i>Jika kamu ingin melaporkan pelanggaran yang dilakukan oleh siswa silahkan untuk menekan tombol di bawah ini</i> </b>
              </p>
            </div>
            <div>
              <button
                @click="openModal"
                class="px-4 py-2 text-sm font-medium leading-5 w-full text-white font-2xl text-center h-17 font-bold transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-800 focus:outline-none focus:shadow-outline-red"
              >
                Tambahkan data laporan pelanggaran
              </button>
            </div>
          </div>
          <div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal"
      >
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
          <button
            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close"
            @click="closeModal"
          >
            <svg
              class="w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              role="img"
              aria-hidden="true"
            >
              <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              ></path>
            </svg>
          </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <p
            class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
          >
            Tambah Data laporan Pelanggaran
          </p>
          <!-- Modal description -->
          <form action="../proses/proses_tambah_pelanggaran.php" method="post">
            <select
                  name="nama_siswa"  
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  <option disabled><strong>Nama Siswa</strong></option>
                  <option>
                    <?php
                    include '../koneksi.php';
                    $query = "SELECT nama FROM siswa";
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . htmlspecialchars($row['nama']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
                    }
                    ?>
                  </option>
                </select>
            <input
              type="text"
              name="pelapor"
              class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Jika berkenan masukan nama jika tidak ketik anonymous"/>
            <select
                  name="jenis_pelanggaran"  
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  
                  <option disabled><strong>jenis_pelanggaran</strong></option>
                  <?php
                  include '../koneksi.php';
                  $query = "SELECT id, nama FROM jenis_pelanggaran";
                  $result = mysqli_query($db, $query);
                  echo '<option disabled selected><strong>jenis_pelanggaran</strong></option>';
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
                  }
                  ?>
                </select>
            <input
              name="bukti"
              type="file"
              class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Masukan bukti"
            />
            <footer
          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
        >
          <button
            @click="closeModal"
            class="w-full px-5 py-5 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancel
          </button>
          <button
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
          >
            Laporkan
          </button>
        </footer>
          </form>
        </div>
        
      </div>
    </div>
          </div>

        </div>
      </main>
    </div>
  </div>
</body>
