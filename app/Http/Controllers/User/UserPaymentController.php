 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserPaymentController extends Controller
{
    public function index(): void
    {
        $apiURL = 'https://dev.khalti.com/api/v2/epayment/initiate/';

        $postInput = [

            "return_url"=> route('user.Payment.index'),

            "website_url"=>route('\\'),

            "amount"=>999*100,
                "phone"=>"9818586602",
            ];













        $headers = [
            "Authorization"=> "Key 5206e172b2424b6b9de3c2b4b0ba2d0e",
        ];

        $response = Http::withHeaders($headers)->post($apiURL, $postInput);

        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);

        echo "Status code: ". $statusCode;  // status code

        dd($responseBody); // body response
    }
}
