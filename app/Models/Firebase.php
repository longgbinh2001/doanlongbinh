<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Firebase extends Model
{
    use HasFactory;
public function up()
{
    Schema::create('firebases', function (Blueprint $table) {
        $table->id();
        $table->string('video_url');
        $table->string('video_name');
        $table->timestamps();
    });
}
}
