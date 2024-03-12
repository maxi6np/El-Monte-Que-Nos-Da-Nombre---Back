<?php
namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller {

    // ? Metodo para subir los trabajos

    public function upload(Request $request) {
        // Verificar si se ha enviado un archivo con el nombre 'file' en la solicitud
        if ($request->hasFile('file')) {
            // Obtener el archivo enviado
            $file = $request->file('file');
            // Generar un nombre único para el archivo
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'uploads' en la carpeta pública
            $file->move(public_path('trabajos'), $fileName);
            // Responder con un JSON indicando que la subida del archivo fue exitosa
            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        // Si no se encuentra un archivo en la solicitud, responder con un JSON indicando el fallo
        return response()->json(['success' => false, 'message' => 'File not found or provided']);
    }

    // ? Medodo para subir mas imagenes de las rutas

    public function subirImagen(Request $request, string $id) {
        // Verificar si se ha enviado un archivo con el nombre 'file' en la solicitud
        if ($request->hasFile('file')) {
            // Obtener el archivo enviado
            $file = $request->file('file');
            // Verificar si el archivo es una imagen
            if ($file->isValid() && strpos($file->getMimeType(), 'image') !== false) {
                // Generar un nombre único para el archivo
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                // Mover el archivo a la carpeta 'uploads' en la carpeta pública
                $file->move(public_path('rutas'), $fileName);
                // Obtener la ruta con el ID especificado
                $ruta = Ruta::find($id);
                // Verificar si se encontró la ruta
                if ($ruta) {
                    // Guardar el nombre del archivo de imagen en el campo correspondiente de la ruta
                    $ruta->imagen_principal = "rutas/" . $fileName;
                    $ruta->save();
                    // Construir la URL del archivo subido
                    $url = url('/rutas/' . $fileName);
                    // Responder con un JSON indicando la subida del archivo fue exitosa y la URL del archivo
                    return response()->json(['success' => true, 'message' => 'File uploaded successfully', 'url' => $url]);
                } else {
                    // Responder con un JSON indicando que no se encontró la ruta con el ID especificado
                    return response()->json(['success' => false, 'message' => 'Route not found']);
                }
            } else {
                // Responder con un JSON indicando que el archivo no es una imagen válida
                return response()->json(['success' => false, 'message' => 'Invalid image file']);
            }
        }
        // Si no se encuentra un archivo en la solicitud, responder con un JSON indicando el fallo
        return response()->json(['success' => false, 'message' => 'File not found or provided']);
    }

}