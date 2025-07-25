
<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;




Route::get("/" , [FrontendController::class , "welcome"]);
// Route::get("/RegisterProperty" , [FrontendController::class , "RegisterProperty"]);
Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
    Route::get("/RegisterProperty" , [FrontendController::class , "RegisterProperty"]);
});
Route::get("/BookPackage" , [FrontendController::class , "BookPackage"]);

Route::post('/landing-contact-submit', [FrontendController::class, 'submitLandingForm'])->name('landing.contact.submit');

Route::get("/Faq" , [FrontendController::class , "Faq"]);
Route::get("/TermsAndCondition" , [FrontendController::class , "TermsAndCondition"]);
Route::get("/PrivacyPolicy" , [FrontendController::class , "PrivacyPolicy"]);

// Route::get("/Home" , [FrontendController::class , "Home"]);
Route::get("/Aboutus" , [FrontendController::class , "Aboutus"]);
// Route::get("/Contactus" , [FrontendController::class , "Contactus"]);
Route::get('/Contactus', [FrontendController::class, 'Contactus'])->name('contact.form');
Route::post('/Contactus', [FrontendController::class, 'submitContact'])->name('contact.submit');

Route::get("/Service" , [FrontendController::class , "Service"]);

Route::get("/CleaningPackage" , [FrontendController::class , "CleaningPackage"]);
Route::get("/PlumbingPackage" , [FrontendController::class , "PlumbingPackage"]);
Route::get("/ElectricalPackage" , [FrontendController::class , "ElectricalPackage"]);
Route::get("/DevicePackage" , [FrontendController::class , "DevicePackage"]);

