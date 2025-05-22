<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Konsultasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <?php include 'heder_user.php'; ?>
    <div class="pt-20 flex">
        <?php include 'sidebar_user.php'; ?>
        <main class="flex-1 ml-4 mr-4 flex justify-center items-start">
            <div class="bg-white p-8 rounded shadow w-full">
                <h1 class="text-2xl font-bold mb-6 text-center">Form Konsultasi</h1>
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label class="block mb-1 font-semibold" for="topik">Topik Konsultasi</label>
                        <input type="text" id="topik" name="topik" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="tanggal">Tanggal Konsultasi</label>
                        <input type="date" id="tanggal" name="tanggal" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div>
                        <label class="block mb-1 font-semibold" for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Kirim Konsultasi</button>
                </form>
                <!-- Card Footer -->
                <div class="mt-8 flex justify-center w-full">
                    <div class="bg-gray-100 border border-gray-200 rounded shadow px-6 py-4 text-center w-full">
                        <span class="text-gray-600 text-sm">&copy; 2025 BIKOO. All rights reserved.</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</body>
</html>
