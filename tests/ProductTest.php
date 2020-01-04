<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldReturnAllProducts(): void
    {
        $ss = $this->get('/api/v1/products');
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'persian_name',
                    'english_name',
                    'store_id',
                    'user_id',
                    'category_id',
                    'sku',
                    'description',
                    'confirmation_status',
                    'in_stock',
                    'warranty_name',
                    'warranty_text',
                    'current_price',
                    'view_count',
                    'comment_count',
                ],
            ],
        ]);
    }
}
