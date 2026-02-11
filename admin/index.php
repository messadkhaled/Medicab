<?php
session_start();
require_once '../model/db_connection.php'; 
require_once '../model/ServiceManager.php'; 
require_once '../model/MedecinManager.php';

if (!isset($_SESSION['admin_id'])) {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && $password === $user['mot_de_passe']) {
            $_SESSION['admin_id'] = $user['id_user'];
            $_SESSION['admin_name'] = $user['prenom'];
            header('Location: index.php');
            exit;
        } else {
            $error = "Identifiants incorrects.";
            require 'vue/login.php';
            exit;
        }
    }
    require 'vue/login.php';
    exit;
}


if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

$action = $_GET['action'] ?? 'dashboard';

if ($action === 'services') {
    $manager = new ServiceManager($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['action_type'];
        
        if ($type === 'delete') {
            $manager->deleteService($_POST['id']);
        } 
        elseif ($type === 'add') {
            $manager->addService($_POST['nom'], $_POST['description']);
        }
        header('Location: index.php?action=services');
        exit;
    }

    $services = $manager->getAllServices();
    require 'vue/services.php';
}
elseif ($action === 'medecins') {
    $medManager = new MedecinManager($pdo);
    $srvManager = new ServiceManager($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['action_type'];
        
        if ($type === 'delete') {
            $medManager->deleteMedecin($_POST['id']);
        }
        elseif ($type === 'add') {
            $medManager->addMedecin(
                $_POST['nom'], 
                $_POST['prenom'], 
                $_POST['specialite'], 
                $_POST['biographie'], 
                $_POST['photo'], 
                $_POST['id_service']
            );
        }
        header('Location: index.php?action=medecins');
        exit;
    }

    $medecins = $medManager->getAllMedecins();
    $servicesList = $srvManager->getAllServices();
    
    require 'vue/medecins.php';
}

elseif ($action === 'admins') {
    require_once '../model/UtilisateurManager.php';
    $userManager = new UtilisateurManager($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['action_type'];
        
        if ($type === 'delete') {
            $userManager->deleteAdmin($_POST['id']);
        } 
        elseif ($type === 'add') {
            $userManager->addAdmin(
                $_POST['nom'], 
                $_POST['prenom'], 
                $_POST['email'], 
                $_POST['password']
            );
        }
        header('Location: index.php?action=admins');
        exit;
    }

    $admins = $userManager->getAllAdmins();
    require 'vue/admins.php';
}


else {
    require 'vue/dashboard.php';
}

?>