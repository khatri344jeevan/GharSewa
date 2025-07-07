
<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;




Route::get("/" , [FrontendController::class , "welcome"]);

Route::get("/Faq" , [FrontendController::class , "Faq"]);
Route::get("/TermsAndCondition" , [FrontendController::class , "TermsAndCondition"]);
Route::get("/PrivacyPolicy" , [FrontendController::class , "PrivacyPolicy"]);

Route::get("/Home" , [FrontendController::class , "Home"]);
Route::get("/Aboutus" , [FrontendController::class , "Aboutus"]);
Route::get("/Contactus" , [FrontendController::class , "Contactus"]);
Route::get("/Service" , [FrontendController::class , "Service"]);

Route::get("/CleaningPackage" , [FrontendController::class , "CleaningPackage"]);
Route::get("/PlumbingPackage" , [FrontendController::class , "PlumbingPackage"]);
Route::get("/ElectricalPackage" , [FrontendController::class , "ElectricalPackage"]);
Route::get("/DevicePackage" , [FrontendController::class , "DevicePackage"]);

