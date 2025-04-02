<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        $model = new UserModel();
        // verificamos el envío del formulario
        if ( $this->validate(['login' => 'required', 'password' => 'required']))
        {
            // Llamamos a la función login con los datos en un array
            $user = $model->login([
                'login' => $this->request->getPost('login'),
                'password' => md5($this->request->getPost('password'))
            ]);

            if (isset($user))
            {
                // si el usuario es válido guardamos los datos en la sesión y redireccionamos
                session()->set(['user' => $user['id'], 'name' => $user['name']]);
                return redirect()->to(base_url() . 'publication');
            }

            // si llega a este segmento de código significa que el usuario no es válido
            session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
        }

        // si ninguna de las condiciones anteriores se cumple volvemos a la página de inicio
        return redirect()->to(base_url());
    }
    public function logout()
{
    session()->destroy();
    return redirect()->to(base_url());
}

}
