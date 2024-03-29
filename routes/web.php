<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TermController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\RentalDataController;
use App\Models\RentalData;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/login', function () {
    \Illuminate\Support\Facades\Redirect::route('admin/login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('formulario')->group(function () {
    Route::get('/proposta', [ProposalController::class, 'index'])->name('formulario/proposta');
    Route::post('/proposta', [ProposalController::class, 'index'])->name('form.proposta.post');
    Route::post('termos',  [ProposalController::class, 'terms'])->name('formulario/termos');
    Route::get('termos',  [ProposalController::class, 'show'])->name('formulario/termos');
    Route::post('/finalizar', [ProposalController::class, 'alterStatus'])->name('form.finish');
    Route::post('/check-terms', [TermController::class, 'store'])->name('form.check-terms');
});
Route::prefix('admin')->group(function () {
    Route::delete('proposal-delete', [RentalDataController::class, 'destroy'])->name('proposal-delete');
//    Route::get('file', \App\Livewire\File::class)->name('admin.arquivos');
});
Route::prefix('api/form')->group( function () {
    Route::post('/proposal', [ProposalController::class, 'createUser'])->name('form/proposal');
});

Route::get('proposta', [RentalDataController::class, 'create']);
Route::get('proposta/analise/{id}/proposal/{proposalId}', [RentalDataController::class, 'analysis'])->name('proposal.analysis.pdf');

Route::get('/finalizar/{email}', [ProposalController::class, 'finishProposal'])->name('proposal.finish');
Route::get('conta-excluida', [ProposalController::class, 'accountDelete'])->name('conta-excluida');
Route::get('phone', function() {
    dump(auth()->user()->id);
    dump(auth()->user()->phone()->get());
    // $rental = auth()->user()->rentalData()->get();
    // foreach ($rental as $key => $value) {
    //    dump($value->id);
    //    $proposal = RentalData::find($value->id);
    //    dump($proposal);
    //    dump($proposal->vehicle()->get());
    // }
    // dump(auth()->user()->address()->get());
    // dump(auth()->user()->bank()->get());
});


require __DIR__.'/auth.php';
