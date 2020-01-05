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
        $this->get('/api/v1/products');
        $this->seeStatusCode(200);
        $this->assertEquals($products->count(),$this->response->getOriginalContent()['data']->count());
    }

    public function testShouldCreateProduct(){
        $parameters = [
            'persian_name' => 'گوشی موبایل',
            'english_name' => 'mobile',
            'store_id' => 1,
            'user_id' => 1,
            'category_id' => 1,
            'brand_id' => 1,
            'description' => 'this is a test production',
            'in_stock' => 20,
            'warranty_name' => 'pars pack',
            'warranty_text' => 'this is a test description for pars pack warranty',
            'current_price' => 50000,
        ];

        $product = $this->post('/api/v1/products',$parameters,[]);
        $this->seeStatusCode(200);
        $this->assertInstanceOf(\App\Models\Product::class, $product->response->getOriginalContent()['data']);
        $this->assertEquals($parameters['persian_name'], $product->response->getOriginalContent()['data']['persian_name']);
        $this->assertEquals($parameters['english_name'], $product->response->getOriginalContent()['data']['english_name']);
        $this->assertEquals($parameters['store_id'], $product->response->getOriginalContent()['data']['store_id']);
        $this->assertEquals($parameters['user_id'], $product->response->getOriginalContent()['data']['user_id']);
        $this->assertEquals($parameters['category_id'], $product->response->getOriginalContent()['data']['category_id']);
        $this->assertEquals($parameters['brand_id'], $product->response->getOriginalContent()['data']['brand_id']);
        $this->assertEquals($parameters['description'], $product->response->getOriginalContent()['data']['description']);
        $this->assertEquals($parameters['in_stock'], $product->response->getOriginalContent()['data']['in_stock']);
        $this->assertEquals($parameters['warranty_name'], $product->response->getOriginalContent()['data']['warranty_name']);
        $this->assertEquals($parameters['warranty_text'], $product->response->getOriginalContent()['data']['warranty_text']);
        $this->assertEquals($parameters['current_price'], $product->response->getOriginalContent()['data']['current_price']);
    }
}
