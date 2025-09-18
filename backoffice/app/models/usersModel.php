<?php

namespace App\Models\UsersModel;

use \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
    FROM users
    ORDER BY created_at DESC";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function create(PDO $conn, array $data)
{
    $sql = "INSERT INTO users
            SET
            firstname = :firstname,
            lastname = :lastname,
            email = :email,
            password = :password,
            created_at = NOW();";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
    $rs->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], PDO::PARAM_STR);
    return $rs->execute();
}
