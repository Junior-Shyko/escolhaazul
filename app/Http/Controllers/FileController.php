<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class FileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $proposal, $type) : JsonResponse
    {
        try {
            $imageFile = $request->file('file');
        $nameImageFile = 'proposal-'.time().rand(1,100).'.'.$imageFile->extension();
        $request->file('file')->storeAs('public', $nameImageFile);
        File::create([
            'name' => $nameImageFile,
            'object_id' => $proposal,
            'object_type' => $type
        ]);

        } catch (Throwable $th) {
            throw $th;
        }
        return response()->json(['messsage' => 'Upload realizado com sucesso']);
    }

}
