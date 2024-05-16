<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use ZipArchive;

class PhotosController extends Controller
{
    private $app_url;

    public function __construct()
    {
        $this->app_url = config('filesystems.disks.uploads.url');
    }

    public function index()
    {
        $model = Photo::all();
        return view('home', compact('model'));
//        return PhotosResources::collection($model);
    }

    public function form()
    {
        return view('form_send');
    }

    public function preview()
    {
        $files = Storage::disk('uploads')->files();
        $url = [];
        foreach ($files as $file) {
            $url[] = $this->app_url . $file;
        }
//        return $url;
        return view('preview', compact('files', 'url'));
    }

    public function send(Request $request)
    {
        try {
            $validate_files = $request->validate([
                'files.*' => 'required|file|mimes:jpeg,png,jpg'
            ]);
            foreach ($request['files'] as $image) {
                $filename = '_' . str_replace(' ', '_', mb_strtolower($image->getClientOriginalName()));
                $path = storage_path() . '/uploads/';
                $latin_name = uniqid() . Str::transliterate($filename);
                $image->move($path, $latin_name);

                $model = new Photo();
                $model->file_name = $latin_name;
                $model->save();

            }
            return back()->with('success', 'Файлы успешно отправлены!');
        } catch (ValidationException $e) {
            return back()->with('danger', 'Не прошло валидацию');
        } catch (\Exception $e) {
            return back()->with('danger', 'Прозошло ошибка: ' . $e);
        }

    }

    public function download($filename)
    {
        $zipFileName = 'archive.zip';

        $zip = new ZipArchive;
        if ($zip->open(storage_path($zipFileName), ZipArchive::CREATE) === true) {
//            foreach ($files as $file) {
                $filePath = storage_path('uploads/' . $filename);
                $zip->addFile($filePath, $filename);
//            }
            $zip->close();
        } else {
            return response()->json(['message' => 'Не получилось создать архив!'], 500);
        }

        return response()->download(storage_path($zipFileName))->deleteFileAfterSend(true);
    }
}
