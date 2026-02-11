<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96 border border-gray-200">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">Administration</h1>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm border border-red-200">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="login">
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                Se connecter
            </button>
        </form>
        
        <div class="mt-4 text-center">
            <a href="../index.php" class="text-sm text-gray-500 hover:underline">← Retour au site public</a>
        </div>
    </div>

</body>
</html>