<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="{ ...data(), isEditModalOpen: false }" lang="en">

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
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop & Mobile sidebar -->
    <?php include '../sidebar.php'; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- Header -->
      <?php include '../header.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Data Jenis Pelanggaran
          </h2>
          <!-- Modal -->
          <div class="gap-6 mb-8 ">
            <div>
              <div
                class="w-full px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- From Uiverse.io by Javierrocadev -->
                <div
                  class="relative rounded-lg w-full mb-2 -skew-x-6 -translate-y-2 -translate-y-6 hover:-translate-y-1 hover:-translate-x-0 hover:skew-x-0 duration-500 w-72 h-44 p-2 bg-neutral-50 card-compact hover:bg-base-200 transition-all duration-200 [box-shadow:12px_12px] hover:[box-shadow:4px_4px]">
                  <figure class="w-full h-full">
                    <div
                      alt="change to a img tag"
                      class="bg-yellow-500 text-neutral-50 min-h-full rounded-lg border border-opacity-5"></div>
                  </figure>
                  <div class="absolute text-neutral-50 bottom-4 left-0 px-4">
                    <span class="font-bold">Tambahkan Data Jenis Pelanggaran</span>
                    <p class="text-sm opacity-60 line-clamp-2">
                      Untuk menambahkan data jenis pelanggaran baru yang akan digunakan untuk keperluan semuanya, dan ditampilkan di table di bawah ini
                    </p>
                  </div>
                </div>


                <p class="text-gray-600 dark:text-gray-400">
                  <b> <i> Untuk mengedit dan menghapus data jenis pelanggaran dapat dilakukan di table bagian action. </i> </b>
                </p>
              </div>
              <div>
                <button
                  @click="openModal"
                  class="px-4 py-2 text-sm font-medium leading-5 w-full text-white font-2xl text-center h-17 font-bold transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Tambahkan data jenis pelanggaran
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
              class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
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
                id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                  <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close"
                    @click="closeModal">
                    <svg
                      class="w-4 h-4"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      role="img"
                      aria-hidden="true">
                      <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                        fill-rule="evenodd"></path>
                    </svg>
                  </button>
                </header>
                <!-- Modal body -->
                <div class="mt-4 mb-6">
                  <!-- Modal title -->
                  <p
                    class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Tambah Data Jenis Pelanggaran
                  </p>
                  <!-- Modal description -->
                  <form action="../proses/proses_tambah_jenispelanggaran.php" method="post">
                    <input
                      name="nama"
                      type="text"
                      class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Masukan Nama Pelanggaran" />
                    <input
                      name="poin"
                      type="number"
                      class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Masukan Poin" />
                    <select
                      name="status"
                      class="block mb-4 w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                      <option disabled>Status Pelanggaran</option>
                      <option value="ringan">Ringan</option>
                      <option value="sedang">Sedang</option>
                      <option value="berat">Berat</option>
                    </select>
                    <footer
                      class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                      <button
                        @click="closeModal"
                        class="w-full px-5 py-5 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                      </button>
                      <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Tambah
                      </button>
                    </footer>
                  </form>
                </div>

              </div>
            </div>
      
          </div>

          <!-- New Table -->
          <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Data Jenis Pelanggaran
          </h4>
          <div class="w-full overflow-hidden rounded-lg shadow-xs mb-5">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nama Pelanggaran</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3">Poin</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  require_once('../koneksi.php');
                  $query = "SELECT * FROM jenis_pelanggaran ORDER BY id DESC";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?php echo htmlspecialchars($row['nama']); ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['status']); ?></td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['poin']); ?></td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                            onclick=" openEditModal('<?php echo $row['id']; ?>', '<?php echo $row['nama']; ?>', '<?php echo $row['poin']; ?>', '<?php echo $row['status']; ?>')">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                            onclick="deleteJenisPelanggaran(<?php echo $row['id']; ?>)">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                        </div>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
            <div
              x-show="isEditModalOpen"
              x-transition:enter="transition ease-out duration-150"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
              id="editModal">
              <div 
                x-show="isEditModalOpen"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 transform translate-y-1/2"
                @click.away="isEditModalOpen = false"
                @keydown.escape="isEditModalOpen = false"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl">
                <header class="flex justify-end">
                  <button
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
                    aria-label="close"
                    @click="isEditModalOpen = false">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                        fill-rule="evenodd"></path>
                    </svg>
                  </button>
                </header>
                <div class="mt-4 mb-6">
                  <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit Data Jenis Pelanggaran
                  </p>
                  <form id="editForm" action="../proses/update_jenis_pelanggaran.php" method="POST">                    <input type="hidden" id="edit_id" name="id">
                      <input
                      id="edit_nama"
                      name="nama"
                      type="text"
                      class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Masukan Nama Pelanggaran" />
                    <input
                      id="edit_poin"
                      name="poin"
                      type="number"
                      class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                      placeholder="Masukan Poin" />
                    <select
                      id="edit_status"
                      name="status"
                      class="block mb-4 w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                      <option disabled>Status Pelanggaran</option>
                      <option value="ringan">Ringan</option>
                      <option value="sedang">Sedang</option>
                      <option value="berat">Berat</option>
                    </select>
                    <div class="flex justify-end mt-6 space-x-3">
                      <button
                        type="button"
                        @click="isEditModalOpen = false"
                        class="px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Batal
                      </button>
                      <button
                        type="submit"
                        class="px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Simpan Perubahan
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
  <script>    function openEditModal(id, nama, poin, status) {
      // Set form values
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_nama').value = nama;
      document.getElementById('edit_poin').value = poin;
      document.getElementById('edit_status').value = status;

      // Find Alpine.js component instance and set modal state
      const alpineComponent = document.querySelector('[x-data]').__x.$data;
      if (alpineComponent) {
        alpineComponent.isEditModalOpen = true;
      } else {
        console.error('Alpine.js component not found');
      }
    }

    function deleteJenisPelanggaran(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data jenis pelanggaran yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7e3af2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch('../proses/delete_jenis_pelanggaran.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: 'id=' + id
            })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'success') {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil!',
                  text: 'Data jenis pelanggaran berhasil dihapus',
                  confirmButtonColor: '#7e3af2'
                }).then(() => {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal!',
                  text: data.message || 'Terjadi kesalahan saat menghapus data',
                  confirmButtonColor: '#7e3af2'
                });
              }
            })
            .catch(error => {
              console.error('Error:', error);
              Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Terjadi kesalahan pada server',
                confirmButtonColor: '#7e3af2'
              });
            });
        }
      });
    }

    document.querySelector('[x-data]').__x.$data.clearFormData = function() {
      const addForm = document.querySelector('form[action="../proses/proses_tambah_jensi_pelanggaran.php"]');
      if (addForm) {
        addForm.reset();
      }
    };

    // Listen for add modal open to clear form
    document.querySelector('[x-data]').__x.$watch('isModalOpen', value => {
      if (value) {
        document.querySelector('[x-data]').__x.$data.clearFormData();
      }
    });

    // Helper function to show alerts
    function showAlert(title, text, icon = 'success') {
      return Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonColor: '#7e3af2'
      });
    }

    // Event listeners for both forms to prevent double submission
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
      form.addEventListener('submit', function() {
        const submitButton = this.querySelector('button[type="submit"]');
        if (submitButton) {
          submitButton.disabled = true;
        }
      });
    });

    // Event listener for form edit
    document.getElementById('editForm')?.addEventListener('submit', function(e) {
      e.preventDefault();

      // Validate required fields
      const requiredFields = ['edit_nama', 'edit_username', 'edit_kelas', 'edit_jkel'];
      let isValid = true;

      requiredFields.forEach(field => {
        const element = document.getElementById(field);
        if (!element.value.trim()) {
          isValid = false;
          element.classList.add('border-red-500');
        } else {
          element.classList.remove('border-red-500');
        }
      });

      if (!isValid) {
        Swal.fire({
          title: 'Error!',
          text: 'Semua field harus diisi',
          icon: 'error',
          confirmButtonColor: '#7e3af2'
        });
        return;
      }

      // Disable submit button and show loading state
      const submitButton = this.querySelector('button[type="submit"]');
      if (submitButton) submitButton.disabled = true;

      const formData = new FormData(this);

      fetch(this.action, {
          method: 'POST',
          body: formData,
          headers: {
            'Accept': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            // Tampilkan SweetAlert sukses
            Swal.fire({
              title: 'Berhasil!',
              text: data.message,
              icon: 'success',
              confirmButtonColor: '#7e3af2',
              allowOutsideClick: false
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'tambah_jenis_pelanggaran.php';
              }
            });
          } else {
            // Tampilkan SweetAlert error
            Swal.fire({
              title: 'Gagal!',
              text: data.message,
              icon: 'error',
              confirmButtonColor: '#7e3af2'
            });
          }
        })
        .catch(error => {
          // Show connection error message
          Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat menghubungi server',
            icon: 'error',
            confirmButtonColor: '#7e3af2'
          });
          if (submitButton) submitButton.disabled = false;
        });
    });
  </script>
</body>

</html>