<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Corresponde al nombre de la tabla en la base de datos
    protected $allowedFields = ['name', 'login', 'password']; // Campos que podrán ser modificados por la aplicación

    public function login($data)
    {
        return $this->asArray()->where($data)->first();
    }
}
