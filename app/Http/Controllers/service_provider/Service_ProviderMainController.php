<?php

namespace App\Http\Controllers\service_provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Service_ProviderMainController extends Controller
{
    public function serviceProvider(){
        return view('service_provider.service_provider');
    }
}
