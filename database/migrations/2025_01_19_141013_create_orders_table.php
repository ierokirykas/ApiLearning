<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->string("customer_name");
            $table->unsignedBigInteger("product_id");
            $table->integer("quantity");
            $table->decimal("discount", 8, 2);
            $table->decimal("total", 8, 2);
            $table->string("status")->default("created");
            $table->string("payment_status")->default("pending");
            $table->string("shipping_status")->default("pending");
            $table->text("shipping_address");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("orders");
    }
};
