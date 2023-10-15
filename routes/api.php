<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RentalDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('form')->group(function () {
    Route::post('/proposal', [ProposalController::class, 'createUser'])->name('form/proposal');
});

Route::put('/rental-data/update', [RentalDataController::class, 'update'])->name('rental-data/update');

Route::get('component/{table}/proposal/{proposal}/user/{user}', [ProposalController::class, 'getData'])->name('getDataProposal');


