<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FAQ - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <?php include 'vue/header.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center text-blue-900 mb-12">Questions Fréquentes</h1>

        <div class="max-w-3xl mx-auto space-y-6">
            
            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Comment prendre rendez-vous ?</h3>
                <p class="text-gray-600">Vous pouvez prendre rendez-vous directement en ligne via la page "Services" en sélectionnant le médecin de votre choix, ou par téléphone au 04 90 00 00 00.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Quels sont les horaires d'ouverture ?</h3>
                <p class="text-gray-600">Le cabinet est ouvert du Lundi au Vendredi de 8h00 à 19h00, et le Samedi matin de 8h00 à 12h00.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Que faire en cas d'urgence ?</h3>
                <p class="text-gray-600">En cas d'urgence vitale, composez immédiatement le 15 (SAMU) ou rendez-vous aux urgences de l'hôpital le plus proche.</p>
            </div>

        </div>
    </main>

    <?php include 'vue/footer.php'; ?>
</body>
</html>