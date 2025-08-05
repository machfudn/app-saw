<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SAW</title>
      <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/input.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center">

  <div class="flex flex-col md:flex-row w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden">

    <!-- Left Side (Form) -->
    <div class="md:w-1/2 p-8">
      <h1 class="text-3xl font-bold text-blue-900 mb-6">Log in.</h1>

      <form action="login-act.php" method="post" class="space-y-6">

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
          <div class="relative">
            <span class="absolute left-3 top-2.5 text-gray-500">
              <i class="bi bi-person"></i>
            </span>
            <input type="text" name="username" placeholder="Username" class="w-full pl-10 pr-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-300 focus:outline-none" />
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="relative">
            <span class="absolute left-3 top-2.5 text-gray-500">
              <i class="bi bi-shield-lock"></i>
            </span>
            <input type="password" name="password" placeholder="Password" class="w-full pl-10 pr-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-300 focus:outline-none" />
          </div>
        </div>

        <div>
          <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition font-semibold shadow">
            Log in
          </button>
        </div>

      </form>
    </div>

    <!-- Right Side (Image/Decoration) -->
    <div class="md:w-1/2 hidden md:block">
      <div class="h-full w-full bg-blue-200 flex items-center justify-center">
        <!-- Gambar atau logo di tengah -->
        <img src="assets/images/login-illustration.png" alt="Login Illustration" class="w-3/4 max-h-96 object-contain">
      </div>
    </div>

  </div>

</body>

</html>
