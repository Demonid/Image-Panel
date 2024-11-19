<?php

namespace App\Controllers;

use App\Models\ImageModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/');
        }

        $imageModel = new ImageModel();
        $images = $imageModel->findAll();

        return view('dashboard', ['images' => $images]);
    }

    public function uploadImage()
    {
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            // Generar un nombre aleatorio para la imagen
            $newName = $image->getRandomName();

            // Mover la imagen al directorio público 'public/uploads/images'
            $image->move(ROOTPATH . 'public/uploads/images', $newName);

            // Guardar el nombre del archivo en la base de datos
            $imageModel = new ImageModel();
            $imageModel->insert(['filename' => $newName]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Hubo un problema al cargar la imagen.');
    }

    public function deleteImage($id)
    {
        $imageModel = new ImageModel();
        $image = $imageModel->find($id);

        if ($image) {
            // Eliminar el archivo físico
            unlink(ROOTPATH . 'public/uploads/images/' . $image['filename']);
            // Eliminar el registro de la base de datos
            $imageModel->delete($id);
        }

        return redirect()->to('/dashboard');
    }
}
