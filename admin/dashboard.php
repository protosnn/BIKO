<?php
require_once '../koneksi.php';
require_once 'cek_login.php'; 
// Query untuk menghitung jumlah siswa
$query_siswa = "SELECT COUNT(*) as total_siswa FROM siswa";
$result_siswa = mysqli_query($db, $query_siswa);
$row_siswa = mysqli_fetch_assoc($result_siswa);
$total_siswa = $row_siswa['total_siswa'];

// Query untuk menghitung jumlah pelanggaran
$query_pelanggaran = "SELECT COUNT(*) as total_pelanggaran FROM pelanggaran";
$result_pelanggaran = mysqli_query($db, $query_pelanggaran);
$row_pelanggaran = mysqli_fetch_assoc($result_pelanggaran);
$total_pelanggaran = $row_pelanggaran['total_pelanggaran'];

// Query untuk menghitung jumlah konsultasi
$query_konsultasi = "SELECT COUNT(*) as total_konsultasi FROM konsultasi";
$result_konsultasi = mysqli_query($db, $query_konsultasi);
$row_konsultasi = mysqli_fetch_assoc($result_konsultasi);
$total_konsultasi = $row_konsultasi['total_konsultasi'];

// Query untuk mengambil data siswa terbaru
$query_latest_siswa = "SELECT * FROM siswa ORDER BY id DESC LIMIT 10";
$result_latest_siswa = mysqli_query($db, $query_latest_siswa);
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin | BIKOO</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
  <script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer></script>
  <script src="../assets/js/init-alpine.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    defer></script>
  <script src="../assets/js/charts-lines.js" defer></script>
  <script src="../assets/js/charts-pie.js" defer></script>
</head>

<body>
  <div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <?php include '../sidebar.php'; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- Header -->
      <?php include '../header.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard Admin
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
              <span>Selamat Datang Mas Admin</span>
            </div>
          </a>
          <!-- Cards -->
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Total Siswa
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?php echo number_format($total_siswa); ?>
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Total Pelanggaran
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?php echo number_format($total_pelanggaran); ?>
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Total Konsultasi
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?php echo number_format($total_konsultasi); ?>
                </p>
              </div>
            </div>
          </div>

          <!-- New Table -->
           <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
              Data Siswa Terbaru
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">Nama Siswa</th>
                      <th class="px-4 py-3">NISN</th>
                      <th class="px-4 py-3">Kelas</th>
                      <th class="px-4 py-3">Jenis Kelamin</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php while ($row = mysqli_fetch_assoc($result_latest_siswa)) : ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?php echo htmlspecialchars($row['nama']); ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['username']); ?></td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['kelas']); ?></td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['jkel']); ?></td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                            onclick="openEditModal(<?php echo $row['id']; ?>, '<?php echo $row['nama']; ?>', '<?php echo $row['username']; ?>', '<?php echo $row['kelas']; ?>', '<?php echo $row['jkel']; ?>')"
                          >
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                            onclick="deleteSiswa(<?php echo $row['id']; ?>)"
                          >
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

            <!-- Edit Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
              <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="editModal">
                <header class="flex justify-end">
                  <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                      <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                  </button>
                </header>
                <div class="mt-4 mb-6">
                  <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit Data Siswa
                  </p>
                  <form id="editForm">
                    <input type="hidden" id="edit_id" name="id">
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Nama</span>
                      <input type="text" id="edit_nama" name="nama" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">username</span>
                      <input type="text" id="edit_nisn" name="nisn" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Kelas</span>
                      <input type="text" id="edit_kelas" name="kelas" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Jkel</span>
                      <select id="edit_jenis_kelamin" name="jenis_kelamin" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </label>
                  </form>
                </div>
                <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                  <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                  </button>
                  <button onclick="updateSiswa()" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Save Changes
                  </button>
                </footer>
              </div>
            </div>

            <!-- Add JavaScript for handling edit and delete -->
            <script>
              // Function to open edit modal with data
              function openEditModal(id, nama, username, kelas, jkel) {
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_nisn').value = username;
                document.getElementById('edit_kelas').value = kelas;
                document.getElementById('edit_jenis_kelamin').value = jkel;
                
                // Buka modal menggunakan Alpine.js
                const modal = document.querySelector('[x-data]').__x.$data;
                modal.isModalOpen = true;
              }

              // Function to update siswa data
              function updateSiswa() {
                const formData = new FormData(document.getElementById('editForm'));
                
                fetch('../proses/update_siswa.php', {
                  method: 'POST',
                  body: formData
                })
                .then(response => response.json())
                .then(data => {
                  if (data.status === 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'Berhasil!',
                      text: 'Data siswa berhasil diperbarui',
                      confirmButtonColor: '#7e3af2'
                    }).then(() => {
                      location.reload();
                    });
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Gagal!',
                      text: data.message || 'Terjadi kesalahan saat memperbarui data',
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

              // Function to delete siswa
              function deleteSiswa(id) {
                Swal.fire({
                  title: 'Apakah Anda yakin?',
                  text: "Data yang dihapus tidak dapat dikembalikan!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#7e3af2',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, hapus!',
                  cancelButtonText: 'Batal'
                }).then((result) => {
                  if (result.isConfirmed) {
                    fetch('../proses/delete_siswa.php', {
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
                          title: 'Terhapus!',
                          text: 'Data siswa berhasil dihapus',
                          confirmButtonColor: '#7e3af2'
                        }).then(() => {
                          location.reload();
                        });
                      } else {
                        Swal.fire({
                          icon: 'error',
                          title: 'Gagal!',
                          text: data.message || 'Gagal menghapus data siswa',
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
            </script>
          <!-- Charts -->
          <h2
            class="my-6 text-2xl font-semibold p text-gray-700 dark:text-gray-200">
            Grafik
          </h2>
          <div class="grid gap-6 mb-8">
            <div
              class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Pelanggaran
              </h4>
              <canvas id="pie"></canvas>
              <div
                class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                  <span
                    class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                  <span>Siswa yang melakukan pelanggaran</span>
                </div>
                <div class="flex items-center">
                  <span
                    class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                  <span>Siswa tertib</span>
                </div>
                <div class="flex items-center">
                  <span
                    class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                  <span>Siswa netral</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script>
    function openEditModal(id, nama, username, kelas, jkel) {
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_nama').value = nama;
      document.getElementById('edit_nisn').value = username;
      document.getElementById('edit_kelas').value = kelas;
      document.getElementById('edit_jenis_kelamin').value = jkel;
      
      // Buka modal menggunakan Alpine.js
      const modal = document.querySelector('[x-data]').__x.$data;
      modal.isModalOpen = true;
    }

    function updateSiswa() {
      const formData = new FormData(document.getElementById('editForm'));
      
      fetch('../proses/update_siswa.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data siswa berhasil diperbarui',
            confirmButtonColor: '#7e3af2'
          }).then(() => {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: data.message || 'Terjadi kesalahan saat memperbarui data',
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

    function deleteSiswa(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7e3af2',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          fetch('../proses/delete_siswa.php', {
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
                title: 'Terhapus!',
                text: 'Data siswa berhasil dihapus',
                confirmButtonColor: '#7e3af2'
              }).then(() => {
                location.reload();
              });
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: data.message || 'Gagal menghapus data siswa',
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
  </script>
</body>
</html>