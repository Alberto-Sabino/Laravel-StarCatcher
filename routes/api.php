<?php

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Car\CreateCarController;
use App\Http\Controllers\Car\EnterWorkshopCarController;
use App\Http\Controllers\Car\ExitWorkshopCarController;
use App\Http\Controllers\Car\GetCarByIdController;
use App\Http\Controllers\Car\ListCarsController;
use App\Http\Controllers\Car\UpdateCarController;

use App\Http\Controllers\Part\CreatePartController;
use App\Http\Controllers\Part\DeletePartController;
use App\Http\Controllers\Part\GetPartByIdController;
use App\Http\Controllers\Part\ListPartsController;

use App\Http\Controllers\Report\GetServiceOrderReportController;
use App\Http\Controllers\Report\GetSummaryReportController;

use App\Http\Controllers\ServiceOrder\AttachPartToServiceOrderController;
use App\Http\Controllers\ServiceOrder\CloseServiceOrderController;
use App\Http\Controllers\ServiceOrder\CreateServiceOrderController;
use App\Http\Controllers\ServiceOrder\GetServiceOrderByIdController;
use App\Http\Controllers\ServiceOrder\ListServiceOrdersController;
use App\Http\Controllers\ServiceOrder\SimulateAttachPartToServiceOrderController;
use App\Http\Controllers\ServiceOrder\UpdateServiceOrderController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui estão todas as rotas da API para o sistema da oficina mecânica.
| Seguindo boas práticas, agrupamos rotas relacionadas por funcionalidade/model.
|
*/

Route::withoutMiddleware('session-validated')
    ->group(function () {
        Route::post('/auth/login', [LoginController::class, 'login']);
    });

// As rotas dos carros eu não usei a herança dos BaseServices,
// somente para mostrar como seria
Route::prefix('cars')->group(function () {
    Route::post('/', [CreateCarController::class, 'create']);
    Route::get('/', [ListCarsController::class, 'list']);
    Route::get('/{id}', [GetCarByIdController::class, 'get']);
    Route::put('/{id}', [UpdateCarController::class, 'update']);
    Route::patch('/{id}/enter-workshop', [EnterWorkshopCarController::class, 'enter']);
    Route::patch('/{id}/exit-workshop', [ExitWorkshopCarController::class, 'exit']);
});


Route::prefix('parts')->group(function () {
    Route::post('/', [CreatePartController::class, 'create']);
    Route::get('/', [ListPartsController::class, 'list']);
    Route::get('/{id}', [GetPartByIdController::class, 'get']);
    Route::delete('/{id}', [DeletePartController::class, 'delete']);
});


Route::prefix('service-orders')->group(function () {
    Route::post('/', [CreateServiceOrderController::class, 'create']);
    Route::get('/', [ListServiceOrdersController::class, 'list']);
    Route::get('/{id}', [GetServiceOrderByIdController::class, 'get']);
    Route::put('/{id}', [UpdateServiceOrderController::class, 'update']);
    Route::patch('/{id}/attach-part', [AttachPartToServiceOrderController::class, 'attach']);
    Route::patch('/{id}/close', [CloseServiceOrderController::class, 'close']);
    
    Route::patch('/{id}/simulate', [SimulateAttachPartToServiceOrderController::class, 'simulate']);
});


Route::prefix('reports')->group(function () {
    Route::get('/service-orders/{id}', [GetServiceOrderReportController::class, 'get']);
    Route::get('/summary', [GetSummaryReportController::class, 'get']);
});
