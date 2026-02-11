<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Services - Admin</title>
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
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Services Existants</h2>
            
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="text-left py-3 px-4 font-semibold text-sm">Nom</th>
                            <th class="text-left py-3 px-4 font-semibold text-sm">Description (Aperçu)</th>
                            <th class="text-right py-3 px-4 font-semibold text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($services as $s): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 font-medium text-gray-900"><?= htmlspecialchars($s->getNomService()) ?></td>
                            <td class="py-3 px-4 text-gray-500 text-sm">
                                <?= htmlspecialchars(substr($s->getDescription(), 0, 50)) ?>...
                            </td>
                            <td class="py-3 px-4 text-right">
                                <form method="POST" action="index.php?action=services" onsubmit="return confirm('Êtes-vous sûr ?');">
                                    <input type="hidden" name="action_type" value="delete">
                                    <input type="hidden" name="id" value="<?= $s->getId() ?>">
                                    <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-bold">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full md:w-1/3">
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200 sticky top-6">
                <h2 class="text-xl font-bold text-blue-800 mb-4">Ajouter un Service</h2>
                
                <form method="POST" action="index.php?action=services">
                    <input type="hidden" name="action_type" value="add">
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nom du Service</label>
                        <input type="text" name="nom" required class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea name="description" rows="4" required class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700 transition">
                        + Créer le service
                    </button>
                </form>
            </div>
        </div>

    </main>

</body>
</html>