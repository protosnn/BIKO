 <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nama Siswa</th>
                    <th class="px-4 py-3">Jenis Pelanggaran</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Pelapor</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                  require_once('../koneksi.php');
                  $query = "SELECT pelanggaran.*, siswa.nama as nama_siswa, jenis_pelanggaran.nama
                           FROM pelanggaran 
                           JOIN siswa ON pelanggaran.siswa_id = siswa.id
                           JOIN jenis_pelanggaran ON pelanggaran.jenis_pelanggaran_id = jenis_pelanggaran.id
                           ORDER BY pelanggaran.id DESC";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) :
                  ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold"><?php echo htmlspecialchars($row['nama_siswa']); ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['nama']); ?></td>
                      <td class="px-4 py-3 text-sm"><?php echo date('d/m/Y', strtotime($row['tgl'])); ?></td>
                      <td class="px-4 py-3 text-sm"><?php echo htmlspecialchars($row['pelapor']); ?></td>
                      <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                          Tercatat
                        </span>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                            onclick="openEditModal(<?php echo $row['id']; ?>, '<?php echo $row['nama_siswa']; ?>', '<?php echo $row['nama']; ?>', '<?php echo $row['tgl']; ?>', '<?php echo $row['pelapor']; ?>')">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                          </button>
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                            onclick="deletePelanggaran(<?php echo $row['id']; ?>)">
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


           <script>
    function submitLaporan(event) {
      event.preventDefault();

      const siswaSelect = document.getElementById('nama_siswa');
      const siswaId = siswaSelect.value;
      const siswaName = siswaSelect.options[siswaSelect.selectedIndex].text;
      const pelapor = document.getElementById('pelapor').value;
      const jenisPelanggaranSelect = document.getElementById('jenis_pelanggaran');
      const jenisPelanggaran = jenisPelanggaranSelect.options[jenisPelanggaranSelect.selectedIndex].text;
      const buktiFile = document.getElementById('bukti').files[0];
      const keterangan = document.getElementById('keterangan').value;

      // Create FormData object
      const formData = new FormData();
      formData.append('siswa_id', siswaId);
      formData.append('pelapor', pelapor);
      formData.append('jenis_pelanggaran_id', jenisPelanggaranSelect.value);
      formData.append('bukti', buktiFile);
      formData.append('keterangan', keterangan);

      // Show confirmation dialog
      Swal.fire({
        title: 'Konfirmasi Laporan',
        html: `
                <div class="text-left">
                    <p class="mb-2"><strong>Nama Siswa:</strong> ${siswaName}</p>
                    <p class="mb-2"><strong>Pelapor:</strong> ${pelapor}</p>
                    <p class="mb-2"><strong>Jenis Pelanggaran:</strong> ${jenisPelanggaran}</p>
                    <p class="mb-2"><strong>Bukti:</strong> ${buktiFile.name}</p>
                    <p class="mb-2"><strong>Keterangan:</strong> ${keterangan}</p>
                </div>
            `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7e3af2',
        cancelButtonColor: '#9ca3af',
        confirmButtonText: 'Ya, Tambahkan!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Send to server
          fetch('../proses_siswa/proses_tambah_pelanggaran.php', {
              method: 'POST',
              body: formData
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              return response.json();
            })
            .then(data => {
              console.log('Server response:', data);
              if (data.status === 'success') {
                // Show success message
                Swal.fire({
                  title: 'Berhasil!',
                  text: 'Laporan pelanggaran berhasil disimpan',
                  icon: 'success',
                  confirmButtonColor: '#7e3af2'
                }).then(() => {
                  // Reset form dan tutup modal
                  document.getElementById('laporanForm').reset();
                  closeModal();

                  // Refresh halaman
                  location.reload();
                });
              } else {
                // Show error message
                Swal.fire({
                  title: 'Gagal!',
                  text: data.message || 'Gagal menyimpan laporan pelanggaran',
                  icon: 'error',
                  confirmButtonColor: '#7e3af2'
                });
              }
            })
            .catch(error => {
              console.error('Error:', error);
              Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat mengirim laporan',
                icon: 'error',
                confirmButtonColor: '#7e3af2'
              });
            });
        }
      });
    }
  </script>

  <!-- Edit Modal backdrop -->
  <div
    x-show="isEditModalOpen"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
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
          Edit Data Pelanggaran
        </p>
        <form id="editForm" action="../proses/update_pelanggaran.php" method="POST">
          <input type="hidden" id="edit_id" name="id">
          <select
            id="edit_siswa"
            name="nama_siswa"
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            required>
            <option value="" disabled>Pilih Nama Siswa</option>
            <?php
            $query = "SELECT id, nama FROM siswa";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
            }
            ?>
          </select>
          <select
            id="edit_jenis_pelanggaran"
            name="jenis_pelanggaran"
            class="block w-full mt-4 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            required>
            <option value="" disabled>Pilih Jenis Pelanggaran</option>
            <?php
            $query = "SELECT id, nama FROM jenis_pelanggaran";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
            }
            ?>
          </select>
          <input
            type="date"
            id="edit_tanggal"
            name="tanggal"
            class="block w-full mt-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            required
          />
          <input
            type="text"
            id="edit_pelapor"
            name="pelapor"
            class="block w-full mt-4 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Masukkan nama pelapor"
            required
          />
          <input
            name="bukti"
            id="bukti"
            type="file"
            class="block mb-4 mt-4 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            required />
          <div class="flex justify-end mt-6 space-x-3">
            <button
              type="button"
              @click="isEditModalOpen = false"
              class="px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
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