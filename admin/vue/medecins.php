<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Médecins - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <header class="bg-blue-900 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between">
            <div class="font-bold text-xl">MediCab Admin</div>
            <a href="index.php" class="text-blue-200 hover:text-white">← Retour au Dashboard</a>
        </div>
    </header>

    <main class="container mx-auto p-8 flex flex-col lg:flex-row gap-8">
        
        <div class="w-full lg:w-2/3">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Médecins Existants</h2>
            
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Nom</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Spécialité</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Service</th>
                            <th class="py-3 px-4 text-right text-sm font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($medecins as $m): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 flex items-center">
                                <img src="<?= htmlspecialchars($m['photo_url']) ?>" class="w-8 h-8 rounded-full mr-3 object-cover bg-gray-200">
                                <span class="font-medium text-gray-900">Dr. <?= htmlspecialchars($m['prenom'] . ' ' . $m['nom']) ?></span>
                            </td>
                            <td class="py-3 px-4 text-gray-500 text-sm"><?= htmlspecialchars($m['specialite']) ?></td>
                            <td class="py-3 px-4 text-blue-600 text-sm font-medium"><?= htmlspecialchars($m['nom_service']) ?></td>
                            <td class="py-3 px-4 text-right">
                                <form method="POST" action="index.php?action=medecins" onsubmit="return confirm('Supprimer ce médecin ?');">
                                    <input type="hidden" name="action_type" value="delete">
                                    <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                    <button class="text-red-600 hover:text-red-900 font-bold text-sm">X</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200 sticky top-6">
                <h2 class="text-xl font-bold text-blue-800 mb-4">Ajouter un Médecin</h2>
                
                <form method="POST" action="index.php?action=medecins">
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
                        <label class="text-xs font-bold text-gray-700 block mb-1">Spécialité</label>
                        <input type="text" name="specialite" placeholder="Ex: Cardiologue" required class="w-full border rounded p-2 text-sm">
                    </div>

                    <div class="mb-3">
                        <label class="text-xs font-bold text-gray-700 block mb-1">Service Attaché</label>
                        <select name="id_service" class="w-full border rounded p-2 text-sm bg-white">
                            <?php foreach ($servicesList as $s): ?>
                                <option value="<?= $s->getId() ?>"><?= htmlspecialchars($s->getNomService()) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="text-xs font-bold text-gray-700 block mb-1">Photo URL</label>
                        <input type="text" name="photo" placeholder="https://..." value="https://randomuser.me/api/portraits/legos/1.jpg" class="w-full border rounded p-2 text-sm">
                    </div>

                    <div class="mb-4">
                        <label class="text-xs font-bold text-gray-700 block mb-1">Biographie</label>
                        <textarea name="biographie" rows="3" required class="w-full border rounded p-2 text-sm"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700">
                        + Ajouter le médecin
                    </button>
                </form>
            </div>
        </div>

    </main>
</body>
</html>