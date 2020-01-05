<?php
use App\Utilities\Constants\ProductConfirmationStatus;
use Laravel\Lumen\Testing\DatabaseMigrations;

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

    public function testShouldUpdateProduct(){
        $this->testShouldCreateProduct();
        $parameters = [
            'persian_name' => 'موبایل سامسونگ',
            'english_name' => 'samsung mobile',
            'store_id' => 1,
            'user_id' => 2,
            'category_id' => 2,
            'brand_id' => 2,
            'description' => 'توضیحات تستی',
            'in_stock' => 5,
            'warranty_name' => 'گارانتی ایرانی',
            'warranty_text' => 'توضیحات تستی برای گارانتی',
            'current_price' => 7500,
        ];
        $this->patch('/api/v1/products/1',$parameters,[]);
        $this->seeStatusCode(200);
    }

    public function testShouldReturnProduct(){
        $this->testShouldCreateProduct();
        $product = $this->get('/api/v1/products/1', []);
        $this->seeStatusCode(200);
        $this->assertInstanceOf(\App\Models\Product::class, $product->response->getOriginalContent()['data']);
    }

    public function testShouldDeleteProduct()
    {
        $this->testShouldCreateProduct();
        $this->delete('/api/v1/products/1', [], []);
        $this->seeStatusCode(200);
    }

    public function testShouldChangeProductConfirmationStatus()
    {
        $status = ProductConfirmationStatus::CONFIRMED;
        $this->testShouldCreateProduct();
        $this->get('/api/v1/products/status/1?status='.$status, []);
        $this->seeStatusCode(200);
    }
}
