<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        // Common Fields
        'user_id',
        'tracking_id',
        'order_status',
        'delivery_status',
        'shipping_charge',
        'order_price',
        'country',
        'service',

        // Delivery Details
        'express_category',
        'sender_name',
        'sender_phone',
        'sender_address',
        'recipient_name',
        'recipient_phone',
        'recipient_address',
        'delivery_product_type',
        'delivery_product_image',

        // Order Details
        'buyer_name',
        'buyer_phone',
        'buyer_email',
        'house_address',
        'apartment_suite',
        'city',
        'state',
        'postcode',
        'delivery_phone',
        'item_category',
        'product_name',
        'product_url',
        'admin_suggestion',
        'preferred_brand',
        'specific_details',
        'price_range',
        'size',
        'weight',
        'category',
        'delivery_mode',
        'product_image',
        'status',
        

    ];
}
