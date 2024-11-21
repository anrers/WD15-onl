<?php

namespace App;

use mysqli;

class UserController
{
    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function getUsersWithFavorites(): array
    {
        $query = "
            SELECT 
                u.id AS user_id,
                u.name AS user_name,
                COALESCE(SUM(p.price), 0) AS total_favorite_price
            FROM 
                users u
            LEFT JOIN 
                favorites f ON u.id = f.user_id
            LEFT JOIN 
                products p ON f.product_id = p.id
            GROUP BY 
                u.id
        ";

        return $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
