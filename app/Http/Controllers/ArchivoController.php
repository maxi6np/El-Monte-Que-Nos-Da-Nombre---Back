<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{

    // Método para manejar la subida de archivos
    public function upload(Request $request)
    {
        // Verificar si se ha enviado un archivo con el nombre 'file' en la solicitud
        if ($request->hasFile('file')) {
            // Obtener el archivo enviado
            $file = $request->file('file');
            // Obtener el nombre original del archivo
            $fileName = $file->getClientOriginalName();
            // Mover el archivo a la carpeta 'uploads' en la carpeta pública
            $file->move(public_path('uploads'), $fileName);
            // Responder con un JSON indicando que la subida del archivo fue exitosa
            return response()->json(['success' => true, 'message' => 'File uploaded successfully']);
        }
        // Si no se encuentra un archivo en la solicitud, responder con un JSON indicando el fallo
        return response()->json(['success' => false, 'message' => 'File not found or provided']);
    }

    // Método para manejar la subida de imagenes
    public function subirImagen(Request $request)
    {
        // Verificar si se ha enviado un archivo con el nombre 'file' en la solicitud
        if ($request->hasFile('file')) {
            // Obtener el archivo enviado
            $file = $request->file('file');
            // Verificar si el archivo es una imagen
            if ($file->isValid() && strpos($file->getMimeType(), 'image') !== false) {
                // Generar un nombre único para el archivo
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                // Mover el archivo a la carpeta 'uploads' en la carpeta pública
                $file->move(public_path('uploads'), $fileName);
                // Construir la URL del archivo subido
                $url = url('/uploads/' . $fileName);
                // Responder con un JSON indicando la subida del archivo fue exitosa y la URL del archivo
                return response()->json(['success' => true, 'message' => 'File uploaded successfully', 'url' => $url]);
            } else {
                // Responder con un JSON indicando que el archivo no es una imagen válida
                return response()->json(['success' => false, 'message' => 'Invalid image file']);
            }
        }
        // Si no se encuentra un archivo en la solicitud, responder con un JSON indicando el fallo
        return response()->json(['success' => false, 'message' => 'File not found or provided']);
    }
}
