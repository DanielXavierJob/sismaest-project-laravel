<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ColumnFillable;
class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "sis_subcategory";

}
