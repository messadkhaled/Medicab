<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <header class="bg-blue-900 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="font-bold text-xl">MediCab Admin</div>
            <nav class="flex space-x-4">
                <span class="text-blue-200">Bonjour, <?= htmlspecialchars($_SESSION['admin_name']) ?></span>
                <a href="index.php?action=logout" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm transition">
                    Déconnexion
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tableau de Bord</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h2 class="text-xl font-bold mb-2">Gérer les Services</h2>
                <p class="text-gray-600 mb-4">Ajouter ou modifier les services médicaux.</p>
                <a href="index.php?action=services" class="text-blue-600 hover:underline font-semibold">Voir la liste →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h2 class="text-xl font-bold mb-2">Gérer les Médecins</h2>
                <p class="text-gray-600 mb-4">Ajouter ou supprimer des docteurs.</p>
                <a href="index.php?action=medecins" class="text-blue-600 hover:underline font-semibold">Voir la liste →</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h2 class="text-xl font-bold mb-2">Gérer les Admins</h2>
                <p class="text-gray-600 mb-4">Ajouter de nouveaux administrateurs.</p>
                <a href="index.php?action=admins" class="text-blue-600 hover:underline font-semibold">Voir la liste →</a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p class="text-sm">&copy; 2026 Admin Panel</p>
    </footer>

</body>
</html>