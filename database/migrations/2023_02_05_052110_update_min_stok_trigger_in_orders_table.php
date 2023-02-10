<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::unprepared('
                CREATE TRIGGER tr_min_stok AFTER INSERT ON orders
                FOR EACH ROW
                BEGIN
                    UPDATE products SET stok = stok - NEW.qty, updated_at = NOW() where id = NEW.product_id;
                END;
            ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::unprepared('DROP TRIGGER tr_orders_stok');
            
        });
    }
};
