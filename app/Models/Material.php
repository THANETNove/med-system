<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_material',//รหัสวัสดุ
        'material_name',//ชื่อ
        'material_number',//จำนวนวัสดุ
        'name_material_count',//ชื่อเรียกจำนวนนับวัสดุ
        'code_material_storage',//รหัสที่เก็บวัสดุ
        'damaged_number',//ชำรุด
        'bet_on_distribution_number',//แทงจำหน่ายวัสดุ
        'wasteful_number', //สิ้นเปลือง
        'repair_number',//การซ่อม
        'status', //สถานะ on/ off
    ];
}
