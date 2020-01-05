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
        $this->assertInstanceOf(\App\Models\Product::class, $product);
        $this->assertEquals($parameters['persian_name'], $product->persian_name);
        $this->assertEquals($parameters['english_name'], $product->english_name);
        $this->assertEquals($parameters['store_id'], $product->store_id);
        $this->assertEquals($parameters['user_id'], $product->user_id);
        $this->assertEquals($parameters['category_id'], $product->category_id);
        $this->assertEquals($parameters['brand_id'], $product->brand_id);
        $this->assertEquals($parameters['sku'], $product->sku);
        $this->assertEquals($parameters['description'], $product->description);
        $this->assertEquals($parameters['confirmation_status'], $product->confirmation_status);
        $this->assertEquals($parameters['in_stock'], $product->in_stock);
        $this->assertEquals($parameters['warranty_name'], $product->warranty_name);
        $this->assertEquals($parameters['warranty_text'], $product->warranty_text);
        $this->assertEquals($parameters['current_price'], $product->current_price);
        $this->assertEquals($parameters['view_count'], $product->view_count);
        $this->assertEquals($parameters['comment_count'], $product->comment_count);
    }
}
