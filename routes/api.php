<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\GuarantorController;
use App\Http\Controllers\RealStateController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\RentalDataController;
use App\Http\Controllers\DataPersonalController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfessionalController;

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

Route::prefix('form')->group( function () {
    // Route::post('/proposal', [ProposalController::class, 'createUser'])->name('form/proposal');
    Route::post('address', [AddressController::class, 'store'] )->name('api/form/address');
    Route::put('address',  [AddressController::class, 'update'] )->name('api/form/address/update');
    Route::post('upload/proposal/{id}/{type}', [FileController::class, 'store'])->name('upload');
    Route::post('phone', [PhoneController::class, 'store'])->name('phone');
});

Route::put('/rental-data/update', [RentalDataController::class, 'update'])->name('rental-data/update');
Route::put('/data-personal/update', [DataPersonalController::class, 'update'])->name('data-personal/update');
Route::put('bank-personal/update', [BankController::class, 'createOrUpdate'] )->name('api/form/bank');
Route::put('real-state/update', [RealStateController::class, 'createOrUpdate'] )->name('api/form/real-state');
Route::put('commercial/update', [CommercialController::class, 'createOrUpdate'] )->name('api/form/commercial');
Route::put('personal/update', [PersonalController::class, 'createOrUpdate'] )->name('api/form/personal');
Route::put('property/update', [PropertyController::class, 'createOrUpdate'] )->name('api/form/property');
Route::put('vehicle/update', [VehicleController::class, 'createOrUpdate'] )->name('api/form/vehicle');

Route::put('professional/update', [ProfessionalController::class, 'createOrUpdate'] )->name('api/professional');


Route::get('component/{table}/proposal/{proposal}/user/{user}/{type}', [ProposalController::class, 'getData'])->name('getDataProposal');
//Busca endereço
Route::get('address/{user}/{object}/{type}' , [AddressController::class, 'show'] )->name('address/show');
//Para Fiador
Route::put('guarantor/update', [GuarantorController::class, 'createOrUpdate'] )->name('api/guarantor');
Route::get('guarantor/{user}/{object}/{type}', [GuarantorController::class, 'show'] )->name('api/get-guarantor');
Route::get('verify-guarantor/{email}',  [GuarantorController::class, 'verifyRequestGuarantor'] )->name('api/verify-guarantor');
Route::post('accept-guarantor',  [GuarantorController::class, 'acceptGuarantor'] )->name('api/accept-guarantor');


