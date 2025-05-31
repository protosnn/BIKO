<?php
session_start();
// Check if student is already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin | BIKOO</title>  
    <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/x-icon">
    <link href="output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-50">
    <div class="flex items-center min-h-screen p-6 bg-gray-50">
      <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1 class="mb-4 text-2xl font-bold text-purple-700 text-center">Login Admin</h1>
              <?php if(isset($_SESSION['error'])): ?>
                <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded">
                    <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
              <?php endif; ?>
              <form action="proses_login_admin.php" method="post" autocomplete="off">
                <label class="block text-sm mb-4">
                  <span class="text-gray-700 font-semibold">Username</span>
                  <input
                    class="block w-full mt-1 text-sm border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 rounded-lg bg-gray-50 px-3 py-2"
                    placeholder="Masukkan Username"
                    name="username"
                    required
                  />
                </label>
                <label class="block text-sm mb-4">
                  <span class="text-gray-700 font-semibold">Password</span>
                  <input
                    class="block w-full mt-1 text-sm border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 rounded-lg bg-gray-50 px-3 py-2"
                    placeholder="Masukkan Password"
                    type="password"
                    name="password"
                    required
                  />
                </label>
                <input type="submit" name="login"
                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="Masuk">
              </form>
              <p class="mt-4 text-sm text-center text-gray-600">
                <a href="admin/login.php" class="text-purple-600 hover:underline">Login sebagai Siswa</a>
              </p>
            </div>
          </div>
          <div class="hidden md:flex items-center justify-center bg-gradient-to-br from-purple-100 to-purple-300 md:w-1/2">
            <img src="../assets/img/login-office.jpeg" alt="Login Illustration" class="w-3/4 rounded-lg shadow-lg" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
