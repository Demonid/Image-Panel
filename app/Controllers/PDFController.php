<?php

namespace App\Controllers;

use CodeIgniter\Controller;  // Asegúrate de importar la clase base Controller
use App\Models\UserModel;
use TCPDF;

class PDFController extends Controller  // Extiende la clase base Controller de CodeIgniter
{
    public function downloadUsers()
    {
        // Instanciamos el modelo de usuarios
        $userModel = new UserModel();

        // Obtenemos todos los usuarios de la base de datos
        $users = $userModel->findAll();

        // Creamos un objeto TCPDF para generar el PDF
        $pdf = new TCPDF();
        $pdf->AddPage(); // Agregamos una página al PDF

        // Definimos la fuente para el título
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Lista de Usuarios', 0, 1, 'C');  // Título centrado

        // Definimos la fuente para el contenido
        $pdf->SetFont('helvetica', '', 10);
        
        // Especificamos los encabezados de las columnas
        $pdf->Cell(40, 10, 'ID', 1);
        $pdf->Cell(80, 10, 'Nombre de Usuario', 1);
        $pdf->Cell(80, 10, 'Correo Electrónico', 1);
        $pdf->Ln(); // Nueva línea después de los encabezados

        // Iteramos sobre los usuarios y los agregamos al PDF
        foreach ($users as $user) {
            $pdf->Cell(40, 10, $user['id'], 1);
            $pdf->Cell(80, 10, $user['username'], 1);
            $pdf->Cell(80, 10, $user['email'], 1);
            $pdf->Ln(); // Nueva línea después de cada usuario
        }

        // Enviamos el PDF al navegador para que el usuario lo descargue
        $pdf->Output('usuarios.pdf', 'D');  // 'D' indica que se descargue el archivo
    }
}
