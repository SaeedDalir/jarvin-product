<?php

use App\Utilities\Constants\ProductConfirmationStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('persian_name');
            $table->string('english_name');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->string('sku')->unique();

            $table->text('description')->nullable();
            $table->char('confirmation_status',1)->default(ProductConfirmationStatus::PRE_CONFIRMATION);

            $table->integer('in_stock')->default(0);

            $table->string('warranty_name')->nullable();
            $table->text('warranty_text')->nullable();

            $table->unsignedDecimal('current_price',5,2);
            $table->unsignedBigInteger('view_count')->default(0);
            $table->unsignedBigInteger('comment_count')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
