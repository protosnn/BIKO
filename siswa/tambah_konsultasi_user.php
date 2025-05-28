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
    defer></script>  <script src="../assets/js/charts-lines.js" defer></script>
  <script src="../assets/js/charts-pie.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      
      <style>
        /* Custom input styling */
        .custom-input {
            background-color: solid gray;
            opacity: 50%;
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            color: white;
            transition: all 0.2s ease;
            width: 100%;
        }
        .custom-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .custom-input::placeholder {
            color: #94a3b8;
        }
        .dark .custom-input {
            background-color: #1f2937;
            border-color: rgba(59, 130, 246, 0.2);
            color: white;
        }
        .dark .custom-input:focus {
            border-color: #3b82f6;
        }
    </style>
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
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Data Konsultasi Siswa 
          </h2>

          <!-- Hero Section -->
          <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="relative bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white rounded-lg p-8 overflow-hidden">
              <!-- Decorative circles -->
              <div class="absolute top-0 right-0 -mt-4 -mr-4">
                <div class="w-32 h-32 rounded-full bg-purple-500 opacity-20"></div>
              </div>
              <div class="absolute bottom-0 left-0 -mb-4 -ml-4">
                <div class="w-24 h-24 rounded-full bg-indigo-500 opacity-20"></div>
              </div>

              <!-- Content -->
              <div class="relative z-10 md:flex items-center justify-between">
                <div class="md:w-2/3 mb-6 md:mb-0">
                  <h3 class="text-2xl font-bold mb-4">Layanan Konsultasi BK Online</h3>
                  <p class="text-purple-100 mb-6 text-lg leading-relaxed">
                    Jangan ragu untuk berbagi cerita dan mencari solusi. Guru BK siap membantu Anda mengatasi berbagai tantangan akademik, sosial, atau pribadi dengan penuh empati dan profesional.
                  </p>
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div class="flex items-center bg-white/10 rounded-lg p-3">
                      <svg class="w-6 h-6 mr-2 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                      </svg>
                      <span>100% Privasi Terjamin</span>
                    </div>
                    <div class="flex items-center bg-white/10 rounded-lg p-3">
                      <svg class="w-6 h-6 mr-2 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span>Respon Cepat</span>
                    </div>
                    <div class="flex items-center bg-white/10 rounded-lg p-3">
                      <svg class="w-6 h-6 mr-2 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                      </svg>
                      <span>Konselor Profesional</span>
                    </div>
                  </div>
                </div>
                <div class="md:w-1/3 flex justify-center items-center">
                  <img src="../assets/img/konsultasi.png" alt="Konsultasi" class="w-64 h-64 object-contain drop-shadow-xl">
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
                    class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-neutral-50 min-h-full rounded-lg border border-opacity-5"
                  ></div>
                </figure>
                <div class="absolute text-neutral-50 bottom-4 left-0 px-4">
                  <span class="font-bold">Buat konsultasi sekarang juga!!!</span>
                  <p class="text-sm opacity-60 line-clamp-2">
                    Halaman ini dirancang sebagai sarana bagi siswa untuk melakukan konsultasi secara langsung dengan guru Bimbingan Konseling (BK). Melalui halaman ini, siswa dapat menyampaikan berbagai keluhan,<br>
                    permasalahan pribadi, atau kendala yang dihadapi selama proses belajar maupun kehidupan sehari-hari di sekolah. Fitur konsultasi ini bertujuan untuk memberikan ruang komunikasi <br>
                    yang aman dan nyaman, sehingga siswa dapat memperoleh bimbingan, solusi, serta dukungan dari guru BK secara efektif dan terarah.
                  </p>
                </div>
              </div>
              <p class="text-gray-600 dark:text-gray-400">
               <b> <i> <b class="font-bold text-red-700">!</b> Guanakan halaman ini dengan sebijak mungkin, privasi kalian terjaga.</i> </b>
              </p>
            </div>
            <div>
              <button
                @click="openModal"
                class="px-4 py-2 text-sm font-medium leading-5 w-full text-white font-2xl text-center h-17 font-bold transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
              >
                Kirim konsultasi
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
            Tambah Data Konsultasi
          </p>          <!-- Modal description -->            <form id="konsultasiForm" onsubmit="sendWhatsApp(event)">
               <div class="mb-4">
                   <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">
                       Nama Lengkap
                   </label>                   
                   <div class="relative">
                       <input 
                       type="text" 
                       name="nama_siswa" 
                       id="nama" 
                       class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                       placeholder="Masukkan nama lengkap Anda..." 
                       required>
                   </div>
               </div>
            <div class="mb-4">
                <label for="keluhan" class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-2">
                    Keluhan / Konsultasi
                </label>
                <textarea
                name="keluhan"
                id="keluhan"
                rows="4"
                class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Tuliskan keluhan atau hal yang ingin dikonsultasikan..."
                required
                ></textarea>
            </div>
            <footer
          class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
        >
          <button type="button"
            @click="closeModal"
            class="w-full px-5 py-5 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
          >
            Cancel
          </button>          
          
          <button type="submit"
            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-green"
            >
            <div class="flex items-center justify-center">
              <span class="mr-2">Kirim ke WhatsApp</span>
              <svg class="w-5 h-5 inline" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2a10 10 0 0 1 7.092 17.034l.93 2.726a1 1 0 0 1-1.234 1.234l-2.726-.93A10 10 0 1 1 12 2zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm-3.6 5.9a.2.2 0 0 1 .2-.2h7.2a.2.2 0 0 1 .2.2v6.2a.2.2 0 0 1-.2.2h-7.2a.2.2 0 0 1-.2-.2V9.9z"/>
              </svg>
            </div>
          </button>
        </footer>
          </form>

        </div>
      </div>
    </div>
  </div>
</main>
</div>
</div>

<script>
function sendWhatsApp(event) {
    event.preventDefault();
    
    const nama = document.getElementById('nama').value;
    const keluhan = document.getElementById('keluhan').value;
    
    // Format pesan
    const text = `Assalamualaikum Pak/Bu,\n\nSaya *${nama}*\nKeluhan saya: \n*${keluhan}*\n\nTerimakasih.`;

    // Tampilkan konfirmasi Sweet Alert
    Swal.fire({
        title: 'Konfirmasi Pengiriman',
        html: `
            <div class="text-left">
                <p class="mb-2"><strong>Nama:</strong> ${nama}</p>
                <p class="mb-2"><strong>Keluhan:</strong></p>
                <p class="text-gray-600">${keluhan}</p>
            </div>
        `,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Kirim!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim ke database
            fetch('../proses_siswa/proses_tambah_konsultasi.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `nama_siswa=${encodeURIComponent(nama)}&keluhan=${encodeURIComponent(keluhan)}`
            })
            .then(response => response.text())
            .then(response => {
                if (response === "success") {
                    // Jika berhasil, tampilkan notifikasi sukses
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data konsultasi berhasil disimpan',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Lanjutkan ke WhatsApp'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Buka WhatsApp
                            const url = `https://api.whatsapp.com/send?phone=6282241643645&text=${encodeURIComponent(text)}`;
                            window.open(url, '_blank');
                            
                            // Reset form dan tutup modal
                            document.getElementById('konsultasiForm').reset();
                            closeModal();
                        }
                    });
                } else {
                    // Jika gagal, tampilkan pesan error
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Gagal menyimpan data konsultasi',
                        icon: 'error',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        }
    });
}
</script>

</body>
</html>