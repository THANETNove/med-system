<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('code_material')->nullable()->comment('รหัสวัสดุ');
            $table->string('material_name')->nullable()->comment('ชื่อ');
            $table->string('material_number')->nullable()->comment('จำนวนวัสดุ');
            $table->string('name_material_count')->nullable()->comment('ชื่อเรียกจำนวนนับวัสดุ');
            $table->string('code_material_storage')->nullable()->comment('รหัสที่เก็บวัสดุ');
            $table->string('damaged_number')->nullable()->comment('จำนวนชำรุด');
            $table->string('bet_on_distribution_number')->nullable()->comment('จำนวน แทงจำหน่ายวัสดุ');
            $table->string('wasteful_number')->nullable()->comment('จำนวนสิ้นเปลือง');
            $table->string('repair_number')->nullable()->comment('จำนวนการซ่อม');
            $table->string('status')->nullable()->comment('สถานะ on/ off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};