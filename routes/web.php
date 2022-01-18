<?php


use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Companies\{HomeCompanies, ShowCompanies, CreateCompanies, EditCompanies};
use App\Http\Livewire\Portal\{
    ShowPortal  
};



/*Route::middleware(['auth:sanctum', 'verified'])->get('/portal', function () {
    
    return view('portal');





})->name('portal');*/

Route::get('/', function (){
    return view('welcome');
});

Route::prefix('portal')->middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/', ShowPortal::class)->name('portal.index');
   
    Route::get('companies', HomeCompanies::class)->name('companies.index');
    Route::get('companies/show/{codigo}', ShowCompanies::class)->name('companies.show');
    Route::get('companies/create', CreateCompanies::class)->name('companies.create');
    Route::get('companies/{codigo}/edit', EditCompanies::class)->name('companies.edit');
    

});

