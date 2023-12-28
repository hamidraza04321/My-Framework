<?php

namespace App\Models;

class User
{
	protected $table = "users";
	protected $fillable = [];
	protected $guarded = [ 'id', 'created_at', 'updated_at' ];
}