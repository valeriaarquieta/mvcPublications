<?php
namespace App\Controllers;
use App\Models\PublicationModel;

class Publication extends BaseController
{
    public function index()
    {
        $model = new PublicationModel();
        $data['posts'] = $model->show();
        
        echo view('header');
        echo view('publication/all', $data);
        echo view('footer');
    }

    
    public function add()
    {
        $model = new PublicationModel();
        
        $imageFile = $this->request->getFile('image');
        $imagePath = null; // Variable para almacenar la ruta de la imagen

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName(); // Genera un nombre único
            $imageFile->move('uploads/', $newName); // Guarda la imagen en 'uploads/'
            $imagePath = 'uploads/' . $newName; // Guarda la ruta
        }

        $model->save([
            'content' => $this->request->getPost('content'),
            'user' => session()->user,
            'image' => $imagePath // Guarda la ruta en la base de datos
        ]);

        return redirect()->to(base_url() . '/publication');
    }

    public function edit($id)
    {
        $model = new PublicationModel();
        $post = $model->find($id);
    
       
            if ($this->validate(['content' => 'required'])) {
             
                $postData = [
                    'content' => $this->request->getPost('content')
                ];
    
                // Procesar la nueva imagen si se sube
                $imageFile = $this->request->getFile('image');
    
                if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {

                    // Eliminar la imagen anterior si existe
                    if (!empty($post['image'])) {
                        unlink($post['image']);
                    }
                   
                    
                    // Guardar la nueva imagen
                    $newName = $imageFile->getRandomName();
                    $imageFile->move('uploads/', $newName);
                    $postData['image'] = 'uploads/' . $newName;
                   
                }
    
                $model->update($id, $postData);
                return redirect()->to(base_url() . '/publication');
            }
         else {
            $data['post'] = $post;
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
    }
    

    public function delete($id)
    {
        $model = new PublicationModel();
        $post = $model->find($id); // Obtener la publicación
    
        if ($post && !empty($post['image'])) {
            unlink($post['image']); // Eliminar la imagen del servidor
        }
    
        $model->delete($id);
        return redirect()->to(base_url() . '/publication');
    }
    


}
