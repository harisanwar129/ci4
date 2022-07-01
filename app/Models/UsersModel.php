<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "email";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'password', 'name','nik','pangkat','tanggal_pk','jabatan','tanggal_jb','upload'];
}