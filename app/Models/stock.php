<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $fillable = [
    'tecno',
    'xiaomi',
    'oppo',
    'huawei',
    'samsung',
    'iphone',
    'motorola',
    'poco',
    'asus',
    'razer',
    'lenovo',
    'hp',
    'acer',
    'apple',
    'componentetec',
    'componentexia',
    'componenteoppo',
    'componentehua',
    'componentesam',
    'componenteiph',
    'componentemoto',
    'componentepoco',
    'componenteasus',
    'componenterazer',
    'componenteleno',
    'componentehp',
    'componenteacer',
    'componenteapple',
    'equiobsoletos',
    'componbsoletos'
    ];
}
