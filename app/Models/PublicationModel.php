<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model 
{
    protected $table = 'publication'; 
    protected $allowedFields = ['content', 'user']; 

    public function get($id = false)
    {
        if ($id === false)
        {
            return $this->findAll(); 
        }

        return $this->asArray()
            ->where(['id' => $id]) 
            ->first();
    }
}
