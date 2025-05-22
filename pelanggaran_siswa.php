<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <?php include 'heder_user.php'; ?>
    <div class="pt-20 flex w-full">
        <?php include 'sidebar_user.php'; ?>
        <main class="flex-1 ">
            <div class="bg-white p-6 rounded shadow ml-4 mr-4">
                <h2 class="text-xl font-semibold mb-4">Laporkan Pelanggaran</h2>
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label class="block mb-1 font-semibold" for="jenis">Nama Siswa</label>
                        <input type="text" id="jenis" name="jenis" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="jenis">Jenis Pelanggaran</label>
                        <input type="text" id="jenis" name="jenis" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                    </div>
                    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">Laporkan</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
