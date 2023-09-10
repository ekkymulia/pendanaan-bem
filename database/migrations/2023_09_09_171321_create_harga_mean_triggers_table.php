<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('harga_mean_trigger', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('harga_mean', 10, 2)->default(0.00);
            $table->decimal('harga_total', 10, 2)->default(0.00);
            $table->unsignedInteger('items_count')->default(0);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
        DB::unprepared('
        CREATE TRIGGER update_harga_mean_trigger_before_update
        BEFORE UPDATE ON dana_riils FOR EACH ROW
        BEGIN
            -- Check if status_id is changing to 1 (from any other status)
            IF NEW.status_id = 1 AND OLD.status_id <> 1 THEN
                -- Update existing record in the harga_mean_trigger table
                UPDATE harga_mean_trigger
                SET harga_total = harga_total + NEW.total_harga,
                    items_count = items_count + NEW.quantity,
                    harga_mean = (harga_total + NEW.total_harga) / (items_count + NEW.quantity)
                WHERE supplier_id = NEW.supplier_id;
            -- Check if status_id is changing from 1 to 2 or 3, or if the record is soft-deleted
            ELSEIF (NEW.status_id = 2 OR NEW.status_id = 3 OR NEW.deleted_at IS NOT NULL) AND OLD.status_id = 1 THEN
                -- Update existing record in the harga_mean_trigger table
                UPDATE harga_mean_trigger
                SET harga_total = harga_total - OLD.total_harga,
                    items_count = items_count - OLD.quantity,
                    harga_mean = (harga_total - OLD.total_harga) / (items_count - OLD.quantity)
                WHERE supplier_id = NEW.supplier_id;
            END IF;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_harga_mean_trigger_after_update');
        Schema::dropIfExists('harga_mean_trigger');
    }
};
