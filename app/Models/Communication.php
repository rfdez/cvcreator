<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    public $email;
    public $name;
    public $telephone;
    public $file;
    public $fileName;
    public $fileExtension;
    public $subject;
    public $details;
}
