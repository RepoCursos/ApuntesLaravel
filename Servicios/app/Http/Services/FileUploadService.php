<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class FileUploadService
{
    protected string $defaultPath = 'img';
    protected string $defaultField = 'file_uri';

    public function guardar(Request $request, Model $model, ?string $field = null, ?string $path = null): void
    {
        $field = $field ?? $this->defaultField;
        $path = $path ?? $this->defaultPath;

        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = $model->id . '-' . time() . '.' . $file->extension();
            $file->move(public_path($path), $fileName);

            $model->{$field} = $fileName;
            $model->save();
        }
    }

    public function actualizar(Request $request, Model $model, ?string $field = null, ?string $path = null): void
    {
        $field = $field ?? $this->defaultField;
        $path = $path ?? $this->defaultPath;

        if ($request->hasFile($field)) {
            $this->delete($model, $field, $path);
            $this->upload($request, $model, $field, $path);
        }
    }

    public function eliminar(Model $model, ?string $field = null, ?string $path = null): void
    {
        $field = $field ?? $this->defaultField;
        $path = $path ?? $this->defaultPath;

        $filePath = public_path($path . '/' . $model->{$field});
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}