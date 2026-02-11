<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <?php include 'vue/header.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center text-blue-900 mb-8">Nous Contacter</h1>

        <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow border border-gray-200">
            <form action="#" method="POST"> <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Votre Email</label>
                    <input type="email" class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ex: jean@mail.com">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Sujet</label>
                    <input type="text" class="w-full border rounded p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Demande de rendez-vous...">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2">Message</label>
                    <textarea class="w-full border rounded p-3 h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded transition">
                    Envoyer le message
                </button>
            </form>
        </div>
    </main>

    <?php include 'vue/footer.php'; ?>
</body>
</html>