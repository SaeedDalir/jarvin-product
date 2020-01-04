<?php
$factory->define(\App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'persian_name' => $faker->name,
        'english_name' => $faker->name,
        'store_id' => $faker->numberBetween(1,5),
        'user_id' => $faker->numberBetween(1,5),
        'category_id' => $faker->numberBetween(1,5),
        'brand_id' => $faker->numberBetween(1,5),
        'sku' => $faker->name,
        'description' => $faker->paragraph(5),
        'confirmation_status' => \App\Utilities\Constants\ProductConfirmationStatus::PRE_CONFIRMATION,
        'in_stock' => $faker->randomNumber(2),
        'warranty_name' => $faker->name,
        'warranty_text' => $faker->name,
        'current_price' => $faker->randomNumber(),
        'view_count' => $faker->randomNumber(),
        'comment_count' => $faker->randomNumber(),
    ];
});

