<?php

namespace App\Http\Controllers;

use App\Model\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FileEntriesController extends Controller
{

    public function uploadFile(Request $request) {
        $this->validate($request, [
//            'file' => 'image|max:3000'
        ]);
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();
        if(Storage::disk('public')->put($filename,  File::get($file))) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = storage_path();
            $input['size'] = $file->getClientSize();
            $file = FileEntry::create($input);
            DB::table('carros_has_imagens')->insert(array('carros_idcarro'=>$request->car, 'imagens_idimagens'=>$file->id));
            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }

    public function create() {
        return view('create');
    }
}
