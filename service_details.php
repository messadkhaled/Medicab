<?php
require_once 'model/db_connection.php'; 
require_once 'model/ServiceManager.php';
require_once 'model/MedecinManager.php';

$serviceId = $_GET['id'] ?? null;

if (!$serviceId) {
    header('Location: index.php');
    exit;
}

$serviceManager = new ServiceManager($pdo);
$medecinManager = new MedecinManager($pdo);

$service = $serviceManager->getServiceById($serviceId);
$medecins = $medecinManager->getMedecinsByServiceId($serviceId);

if (!$service) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($service->getNomService()) ?> - MediCab</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <?php include 'vue/header.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-10">
        
        <a href="index.php" class="inline-flex items-center text-blue-600 hover:underline mb-6">
            &larr; Retour aux services
        </a>

        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200 mb-10 text-center">
            <h1 class="text-4xl font-bold text-blue-800 mb-4">
                <?= htmlspecialchars($service->getNomService()) ?>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                <?= htmlspecialchars($service->getDescription()) ?>
            </p>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
            Médecins disponibles
        </h2>

        <?php if (empty($medecins)): ?>
            <div class="bg-yellow-50 text-yellow-800 p-4 rounded-lg">
                Aucun médecin n'est encore affecté à ce service.
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <?php foreach ($medecins as $medecin): ?>
                    <div class="bg-white p-6 rounded-lg shadow flex items-start space-x-4 border border-gray-100">
                        <img src="<?= htmlspecialchars($medecin->getPhotoUrl()) ?>" 
                             alt="Doctor" 
                             class="w-20 h-20 rounded-full object-cover border-2 border-blue-100">
                        
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">
                                Dr. <?= htmlspecialchars($medecin->getNomComplet()) ?>
                            </h3>
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">
                                <?= htmlspecialchars($medecin->getSpecialite()) ?>
                            </span>
                            <p class="text-gray-600 text-sm mt-1">
                                <?= htmlspecialchars($medecin->getBiographie()) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </main>

    <?php include 'vue/footer.php'; ?>

</body>
</html>