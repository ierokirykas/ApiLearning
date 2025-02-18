<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RollController extends Controller
{
    public function index() {
        $dices = [
            'dice1' => rand(1,6),
            'dice2' => rand(1,6),
            'dice3' => rand(1,60)
        ];
        return response()->json($dices);
    }
    public function status()
    {
        $status_info = [
            "status"=>"active"
        ];
        return response()->json($status_info);
    }
    public function store()
    {
        $shop_info = ["name"=>"PhotoShop",
        "address"=> "ул. Театральная, д. 15, г. Рязань",
        "working_hours"=> "Пн-Пт: 9:00-20:00, Сб-Вс: 10:00-18:00",
        "phone"=> "+79885329901",
        "email"=> "info@photoshop.com",
        "website"=> "https://www.realphotoshop.com",
        "description"=> "Магазин картин и фотографий",
        "social_media" => [
            "instagram"=> "https://www.instagram.com/realphotoshop",
            "facebook"=> "https://www.facebook.com/realphotoshop"
            ]
        ];
        return response()->json($shop_info);
    }
}
