<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RealStateController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\RentalDataController;
use App\Http\Controllers\DataPersonalController;

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
    Route::post('address', [AddressController::class, 'store'] )->name('api/form/address');
    
    Route::put('address', [AddressController::class, 'update'] )->name('api/form/address/update');
    
});

Route::put('/rental-data/update', [RentalDataController::class, 'update'])->name('rental-data/update');
Route::put('/data-personal/update', [DataPersonalController::class, 'update'])->name('data-personal/update');
Route::put('bank-personal/update', [BankController::class, 'createOrUpdate'] )->name('api/form/bank');
Route::put('real-state/update', [RealStateController::class, 'createOrUpdate'] )->name('api/form/real-state');
Route::put('commercial/update', [CommercialController::class, 'createOrUpdate'] )->name('api/form/commercial');


Route::get('component/{table}/proposal/{proposal}/user/{user}/$type', [ProposalController::class, 'getData'])->name('getDataProposal');
//Busca endereço
Route::get('address/{user}/{object}/{type}' , [AddressController::class, 'show'] )->name('address/show');


