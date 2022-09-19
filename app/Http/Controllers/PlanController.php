<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucasDotVin\Soulbscription\Models\Plan;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Symfony\Component\ErrorHandler\Error\FatalError;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $classStudent = Auth::user()->classroom->classroom_name;

        if (str_starts_with($classStudent, '3'))
        {
            $amount = 8000;
        } else if (str_starts_with($classStudent, 'P'))
        {
            $amount = 10000;
        } else if (str_starts_with($classStudent, 'T'))
        {
            $amount = 12000;
        }
        else
        {
            $amount = null;
        }

        return view('member.plans.index', [
            'currentSubscription' => auth()->user()->subscription
        ], compact('amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {

        ini_set('max_execution_time', -1);

        $classStudent = Auth::user()->classroom->classroom_name;

        if (str_starts_with($classStudent, '3'))
        {
            $amount = 8000;
        } else if (str_starts_with($classStudent, 'P'))
        {
            $amount = 10000;
        } else if (str_starts_with($classStudent, 'T'))
        {
            $amount = 12000;
        }
        else
        {
            $amount = null;
        }

        $phone_number = $request['phone_number'];

        $client = new Client();

        // Get access token
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $body = '{
            "username": "d7AVPxga0WNGxUovZr32qy1rckdqUa4DfrdXBZN4gyJrYJ3dExEABcGfLRYcYzbPlljDsqTO7hBGdswmcg71fQ",
            "password": "2hcFswPlJ0rUt84n4SwtxaKfqdx8j2AW1RLJ64LVeTnipKheCnq-9q7V4RK9j7VI6d6T218l47cdLVWveE_-RA"
        }';
        $request = new Psr7Request('POST', 'https://campay.net/api/token/', $headers, $body);
        $res = $client->sendAsync($request)->wait();
        $obj = json_decode($res->getBody());
        $token = $obj->token;


        // Request Payment
        $headers1 = [
            'Authorization' => "Token $token",
            'Content-Type' => 'application/json'
        ];
        $body1 = '{
            "amount": "'.$amount.'",
            "from": "'.preg_replace("/[^0-9]/", "", "$phone_number" ).'"
        }';

        try
        {
            $request1 = new Psr7Request('POST', 'https://campay.net/api/collect/', $headers1, $body1);
            $res1 = $client->sendAsync($request1)->wait();
        }
        catch (BadResponseException $e) {
            $response = $e->getResponse();
            $output = json_decode($response->getBody());
            $error_code = $output->error_code;

            if($error_code == "ER101")
            {
                $error = 'Invalid phone number. Ensure the number starts with the country code.';

                return redirect()->back()->with([
                    'error' => $error,
                ]);
            }
            else if($error_code == "ER102")
            {
                $error = 'Unsupported Carrier phone number. Currently, only MTN and Orange phone numbers are accepted for mobile money.';

                return redirect()->back()->with([
                    'error' => $error,
                ]);
            }
            else if($error_code == "ER201")
            {
                $error = 'Invalid amount. Decimal numbers are NOT allowed. Amount can been sent as integer or string.';

                return redirect()->back()->with([
                    'error' => $error,
                ]);
            }
            else if($error_code == "ER301")
            {
                $error = 'Insufficient balance. Trying to withdraw an amount which is above your current balance for the specific carrier.';

                return redirect()->back()->with([
                    'error' => $error,
                ]);
            }
            else
            {
                $error = 'An error occurred during the operation. Please try again..';

                return redirect()->back()->with([
                    'error' => $error,
                ]);
            }
        }

        $obj1 = json_decode($res1->getBody());
        $reference = $obj1->reference;

        // Transaction Status
        do
        {
            $request = new Psr7Request('GET', "https://campay.net/api/transaction/".$reference."/", $headers1);
            $res = $client->sendAsync($request)->wait();
            // echo $res->getBody();
            $obj = json_decode($res->getBody());
            $statut = $obj->status;

        }
        while($statut == "PENDING");


        if($statut === "SUCCESSFUL")
        {
            $subscription = auth()->user()->subscribeTo($plan);

            $price = new SubscriptionUser;
            $price->user_id = Auth::user()->id;
            $price->subscription_price = $amount;
            $price->subscription_id = $subscription->id;
            $price->save();

            $status = 'Annual subscription completed successfully.';

            return redirect()->back()->with([
                'status' => $status,
            ]);
        }
        else
        {
            $error = 'Your payment transaction has failed.';

            return redirect()->back()->with([
                'error' => $error,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        auth()->user()->subscription->suppress();
        auth()->user()->subscriptionPrices->last()->pivot->delete();

        return redirect()->back();
    }
}
