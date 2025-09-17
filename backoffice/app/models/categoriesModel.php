<?php
namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion): array {
    $sql = "SELECT * 
            FROM categories
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}