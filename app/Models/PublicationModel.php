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

    public function show()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('publication'); // Tabla principal de publicaciones
        $builder->select('publication.*, user.name AS user_name'); // Selecciona datos de ambas tablas, renombrando 'name' de user para evitar conflictos
        $builder->join('user', 'user.id = publication.user'); // Relación entre 'publication.user' y 'user.id'
        $builder->orderBy('publication.id', 'DESC'); // Orden descendente por ID
        return $builder->get()->getResultArray(); // Devuelve los resultados como un arreglo asociativo
    }



}
