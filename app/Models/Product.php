<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use Illuminate\Support\Facades\Http;
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'status',
        'image'
    ];

    /*
     * Создание нового продукта
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public static function createProduct(array $data)
    {
        $response = Http::get(url('/image'));
        $url = $response->json()['url'] ?? null;
        $data['image'] = $url;
        return self::create($data);
    } //Не понимаю... Вроде правильно сделал, а выдаёт null
    //Кстати, я не помню, а мы изучали как читать url запросы?

    /*
    * Получение информации о продукте
    *
    * @return array
    */
    public function getInfo(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'status' => $this->status,
            'image' => $this->image,
        ];
    }

    /*
     * Обновление статуса продукта
     * 
     * @param  string  $status
     * @return \App\Models\Product
     */
    public function updateStatus(string $status)
    {
        $this->update(['status' => $status]);
        return $this;
    }

    /*
     * Обновление количества на складе
     * 
     * @param  int  $quantity
     * @return \App\Models\Product
     */
    public function updateStock(int $quantity)
    {
        $this->update(['stock' => $quantity]);
        return $this;
    }

    /*
     * Уменьшение количества на складе
     * 
     * @param  int  $quantity
     * @return bool
     */
    public function decreaseStock(int $quantity)
    {
        if ($this->stock >= $quantity) {
            $this->update(['stock' => $this->stock - $quantity]);
            return true;
        }
        return false;
    }

    /*
     * Увеличение количества на складе
     * 
     * @param  int  $quantity
     * @return \App\Models\Product
     */
    public function increaseStock(int $quantity)
    {
        $this->update(['stock' => $this->stock + $quantity]);
        return $this;
    }

    /*
     * Проверка наличия на складе
     * 
     * @param  int  $quantity
     * @return bool
     */
    public function isInStock(int $quantity = 1): bool
    {
        return $this->stock >= $quantity;
    }

    /*
     * Обновление цены
     * 
     * @param  float  $price
     * @return \App\Models\Product
     */
    public function updatePrice(float $price)
    {
        $this->update(['price' => $price]);
        return $this;
    }

    // Отношение с заказами
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
