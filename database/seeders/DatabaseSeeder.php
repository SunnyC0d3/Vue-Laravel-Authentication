<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeProduct;
use App\Models\AttributeValue;
use App\Models\Customer;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Order;
use App\Models\OrderProduct;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = ['admin', 'subscriber', 'editor'];
        $atr_values = ['blue', 'red', 'green'];

        for($i=0; $i<3; $i++) {
            UserRole::factory()->create([
                'role' => $user_roles[$i],
            ]);
        }
        
        $customer = Customer::factory()->count(10)->create();

        User::factory()->count(2)->create();

        Category::factory()->create();

        Product::factory()->count(10)->create();

        for($i=0; $i<2; $i++) {
            Order::factory()->create([
                'billing_email' => $customer[$i]->email_address,
                'billing_firstname' => $customer[$i]->firstname,
                'billing_lastname' => $customer[$i]->lastname,
                'billing_address' => $customer[$i]->address,
                'billing_city' => $customer[$i]->city,
                'billing_country' => $customer[$i]->country, 
                'billing_postalcode' => $customer[$i]->post_code,
                'billing_phone' => $customer[$i]->phone_number,
                'billing_discount_code' => '',
                'billing_subtotal' => 0,
                'billing_tax' => 0,
                'billing_total' => 0,
            ]);

            OrderProduct::factory()->create([
                'order_id' => $i+1,
                'product_id' => $i+1,
                'quantity' => 3
            ]);
        }

        for($i=0; $i<10; $i++) {

            ProductCategory::factory()->create([
                'product_id' => $i + 1,
                'category_id' => 1
            ]);

            ProductImage::factory()->create([
                'product_id' => $i + 1,
                'product_image_url' => '/images/products/product_' . $i + 1 . '.jpg',
            ]);
            
        }

        Attribute::factory()->create();

        for($i=0; $i<3; $i++) {


            AttributeValue::factory()->create([
                'attribute_id' => 1,
                'attribute_value' => $atr_values[$i],
            ]);
        }

        for($i=0; $i<10; $i++) {
            AttributeProduct::factory()->create([
                'attribute_value_id' => rand(1, 3),
                'product_id' => $i + 1
            ]);
        }

    }
}
