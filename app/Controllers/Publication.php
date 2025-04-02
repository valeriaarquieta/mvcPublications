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

        // Obtener el ID del usuario desde la sesión
        $userId = session()->user; 
    
        $model->save([
            'content' => $this->request->getPost('content'),
            'user' => $userId
        ]);
    
        return redirect()->to(base_url() . '/publication');
    }
    

    public function edit($id)
    {
        $model = new PublicationModel();
  
        if ( $this->validate(['content' => 'required']))
        {
            $postData = [
                'content' => $this->request->getPost('content') 
            ];

            $model->update($id, $postData);
            return redirect()->to(base_url() . '/publication');
        }
        else {
            $data['post'] = $model->get($id);
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
    }

    public function delete($id)
    {
        $model = new PublicationModel();
        $model->delete($id);
        return redirect()->to(base_url() . '/publication');
    }



}
