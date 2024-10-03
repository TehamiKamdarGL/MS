<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_material_id')->constrained('raw_materials')->onDelete('cascade');
            $table->integer('quantity_used');
            $table->integer('quantity_produced');
            $table->integer('on_hand_quantity');
            $table->date('production_date');
            $table->timestamps();
        });
        DB::statement("
            CREATE TRIGGER deduct_raw_material_quantity
            AFTER INSERT ON productions
            FOR EACH ROW
            BEGIN
                -- Update raw material quantity
                UPDATE raw_materials 
                SET quantity = quantity - NEW.quantity_used
                WHERE id = NEW.raw_material_id;

                -- Prevent negative raw material quantity
                IF (SELECT quantity FROM raw_materials WHERE id = NEW.raw_material_id) < 0 THEN
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Not enough raw material';
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP TRIGGER IF EXISTS deduct_raw_material_quantity");
        Schema::dropIfExists('inventories');
    }
};
