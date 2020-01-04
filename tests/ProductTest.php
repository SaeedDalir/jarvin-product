<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShouldReturnAllProducts()
    {
        $products = factory(\App\Models\Product::class, 5)->create();
        $result = $this->get('/api/v1/products');
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['created_at'],
            'message' => [],
            'status' => [],
        ],[
            'data' => [],
            'message' => 'success',
            'status' => 200,
        ]);
    }
}
