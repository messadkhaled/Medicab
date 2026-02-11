<?php
require_once 'model/db_connection.php';
require_once 'model/ServiceManager.php';

$manager = new ServiceManager($pdo);

$services = $manager->getAllServices();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet WEB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-50">

    <?php include 'vue/header.php'; ?>

    <main class="flex-grow container mx-auto p-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Nos Services Médicaux</h1>
            <p class="text-gray-600 text-lg">Une équipe de spécialistes à votre écoute.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php foreach ($services as $service): 
               
                $fullDescription = $service->getDescription();
                
              
                $preview = (strlen($fullDescription) > 100) ? substr($fullDescription, 0, 100) . '...' : $fullDescription;
            ?>
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col">
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-blue-600 mb-3">
                            <?= htmlspecialchars($service->getNomService()) ?>
                        </h3>
                        
                        <p class="text-gray-600 leading-relaxed mb-6">
                            <?= htmlspecialchars($preview) ?>
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 px-8 py-4 mt-auto border-t border-gray-100">
                        <a href="service_details.php?id=<?= $service->getId() ?>" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center">
                            Voir les médecins <span class="ml-2">→</span>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>
    </main>

    <?php include 'vue/footer.php'; ?>

</body>
</html>