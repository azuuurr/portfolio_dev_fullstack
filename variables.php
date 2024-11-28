<?php
// variables.php

// Variables du site
$siteName = 'Alex Smith';
$siteTitle = 'Alex Smith - PORTFOLIO';
$profileImage = 'assets/img/my-profile-img.jpg';

// Liens vers les réseaux sociaux
$socialLinks = array(
    'twitter' => '#',
    'facebook' => '#',
    'instagram' => '#',
    'skype' => '#',
    'linkedin' => '#',
);

// Fonctions pour récupérer les données depuis la base de données

// Fonction pour récupérer tous les projets
function getProjects($mysqlClient) {
    $stmt = $mysqlClient->prepare("SELECT * FROM projects");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour récupérer les compétences distinctes
function getCompetences($mysqlClient) {
    $stmt = $mysqlClient->prepare("SELECT DISTINCT competences FROM projects");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Fonction pour récupérer les détails d'un projet spécifique
function getProjectDetails($mysqlClient, $project_id) {
    $stmt = $mysqlClient->prepare("
        SELECT p.*, pd.category, pd.client, pd.project_date, pd.description AS detail_description
        FROM projects p
        JOIN project_details pd ON p.id = pd.project_id
        WHERE p.id = :id
    ");
    $stmt->bindParam(':id', $project_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
