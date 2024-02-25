<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $proposal, $type)
    {
        try {
            $imageFile = $request->file('file');
            // dump($imageFile);
        $nameImageFile = time().rand(1,100).'.'.$imageFile->extension();
        // $imageFile->move(public_path('storage'), $nameImageFile);
        $request->file('file')->storeAs('public/upload', $nameImageFile);
        File::create([
            'name' => $nameImageFile,
            'object_id' => $proposal,
            'object_type' => $type
        ]);

        } catch (\Throwable $th) {
            throw $th;
        }
        return response()->json(['messsage' => 'Upload realizado com sucesso']);
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
