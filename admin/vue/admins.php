<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Admins - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <header class="bg-blue-900 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between">
            <div class="font-bold text-xl">MediCab Admin</div>
            <a href="index.php" class="text-blue-200 hover:text-white">← Retour au Dashboard</a>
        </div>
    </header>

    <main class="container mx-auto p-8 flex flex-col md:flex-row gap-8">
        
        <div class="w-full md:w-2/3">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Administrateurs</h2>
            
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Nom</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Email</th>
                            <th class="py-3 px-4 text-right text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($admins as $admin): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium text-gray-900">
                                <?= htmlspecialchars($admin['prenom'] . ' ' . $admin['nom']) ?>
                            </td>
                            <td class="py-3 px-4 text-gray-500 text-sm">
                                <?= htmlspecialchars($admin['email']) ?>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <?php if (!isset($_COOKIE['admin_id']) || $admin['id_user'] != $_COOKIE['admin_id']): ?>
                                    <form method="POST" action="index.php?action=admins" onsubmit="return confirm('Supprimer cet admin ?');">
                                        <input type="hidden" name="action_type" value="delete">
                                        <input type="hidden" name="id" value="<?= $admin['id_user'] ?>">
                                        <button class="text-red-600 hover:text-red-900 font-bold text-sm">Supprimer</button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400 italic">(Vous)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full md:w-1/3">
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200 sticky top-6">
                <h2 class="text-xl font-bold text-blue-800 mb-4">Ajouter un Admin</h2>
                
                <form method="POST" action="index.php?action=admins">
                    <input type="hidden" name="action_type" value="add">
                    
                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="text-xs font-bold text-gray-700 block mb-1">Prénom</label>
                            <input type="text" name="prenom" required class="w-full border rounded p-2 text-sm">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-700 block mb-1">Nom</label>
                            <input type="text" name="nom" required class="w-full border rounded p-2 text-sm">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="text-xs font-bold text-gray-700 block mb-1">Email</label>
                        <input type="email" name="email" required class="w-full border rounded p-2 text-sm">
                    </div>

                    <div class="mb-4">
                        <label class="text-xs font-bold text-gray-700 block mb-1">Mot de passe</label>
                        <input type="password" name="password" required class="w-full border rounded p-2 text-sm">
                    </div>

                    <button type="submit" class="w-full bg-purple-600 text-white font-bold py-2 rounded hover:bg-purple-700">
                        + Créer l'admin
                    </button>
                </form>
            </div>
        </div>

    </main>
</body>
</html>