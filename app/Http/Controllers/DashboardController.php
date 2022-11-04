<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Document;
use App\Models\DocumentUser;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Psr7\Request as Psr7Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Count Documents
        $documents = Document::all()->count();
        $books = Document::where('document_type', 'Book')->count();
        $papers = Document::where('document_type', 'Paper')->count();

        $p_book = percentage($books, $documents);
        $p_paper = percentage($papers, $documents);

        $documents = number_format_short($documents);


        // Weekly Subscriptions
        $dates = collect();
        foreach( range( -6, 0 ) AS $i ) {
            $date = Carbon::now()->addDays( $i )->format( 'Y-m-d' );
            $dates->put( $date, 0);
        }

        $subscriptions = Subscription::where( 'created_at', '>=', $dates->keys()->first() )
        ->groupBy( 'date' )
        ->orderBy( 'date' )
        ->get([
            DB::raw( 'DATE( created_at ) as date' ),
            DB::raw( 'COUNT( * ) as "count"' )
        ])
        ->pluck( 'count', 'date' );
        $dates = $dates->merge( $subscriptions );


        $days_array = array_keys($dates->toArray());

        $days = array();
        foreach ($days_array as $key => $day) {
            $value = Carbon::parse($day)->format('D');
            $days[] = $value;
        }

        $subs = array_values($dates->toArray());

        $count_subs = Subscription::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $previous_week = strtotime("-1 week +1 day");
        $start_week = strtotime("last sunday midnight",$previous_week);
        $end_week = strtotime("next saturday",$start_week);
        $start_week = date("Y-m-d",$start_week);
        $end_week = date("Y-m-d",$end_week);

        $prev_subs = Subscription::whereBetween('created_at', [$start_week, $end_week])->count();

        $week_growth = growth($count_subs, $prev_subs);
        $count_subs = number_format_short($count_subs);

        // Monthly Downloads
        $downloads = DocumentUser::all()->count();
        $downloads = number_format_short($downloads);

        $count_downs = DocumentUser::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->distinct('document_id')->count();

        $prev_downs = DocumentUser::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth()->month)->distinct('document_id')->count();

        $down_growth = growth($count_downs, $prev_downs);

        $first_monday = new Carbon('first monday of this month');
        $week = mondaysInMonth();

        $count_weeks = collect();

        foreach( range( 0,  $week) AS $i ) {
            $count_week = $first_monday->addWeeks( $i )->format( 'W' );
            $count_weeks->put( $count_week, 0);
        }

        $num_donwloads = DocumentUser::where( 'created_at', '>=', $count_weeks->keys()->first() )
        ->groupBy( 'date' )
        ->orderBy( 'date' )
        ->get([
            DB::raw( 'DATE( created_at ) as date' ),
            DB::raw( 'COUNT( * ) as "count"' )
        ])
        ->pluck( 'count', 'date' );
        $count_weeks = $count_weeks->merge( $num_donwloads );

        $numb = array_values($count_weeks->toArray());

        $exams = Exam::all()->count();
        $exams = number_format_short($exams);

        $classrooms = Classroom::all()->count();
        $classrooms = number_format_short($classrooms);

        $subjects = Subject::all()->count();
        $subjects = number_format_short($subjects);

        $members = User::whereHas('roles', function ($q) {
            $q->where('name', 'Member');
        })->count();
        $members = number_format_short($members);

        $suscribers = User::whereHas('subscriptions', function ($q) {
            $q->where('suppressed_at', null);
        })->count();
        $suscribers = number_format_short($suscribers);

        $admins = User::whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->count();
        $admins = number_format_short($admins);

        $user_subscriptions = SubscriptionUser::select('id', 'subscription_price', 'created_at')
        ->whereYear('created_at', Carbon::now()->year)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            $current_year = Carbon::parse($date->created_at)->format('m');
            return $current_year;
        });

        $subscriptionmcount = [];
        $subscriptionArr = [];

        foreach ($user_subscriptions as $key => $value) {
            $subscriptionmcount[(int)$key] = $value->pluck('subscription_price')->sum();
            // number_format($value->pluck('subscription_price')->sum(), 0, ',', ' ');
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($subscriptionmcount[$i])){
                $subscriptionArr[$i] = $subscriptionmcount[$i];
            }else{
                $subscriptionArr[$i] = 0;
            }
        }

        $user_last_subscriptions = SubscriptionUser::select('id', 'subscription_price', 'created_at')
        ->whereYear('created_at', Carbon::now()->subYear()->year)
        ->get()
        ->groupBy(function($date) {
            //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            $last_year = Carbon::parse($date->created_at)->format('m');
            return $last_year;
        });

        $last_subscriptionmcount = [];
        $last_subscriptionArr = [];

        foreach ($user_last_subscriptions as $key => $value) {
            $last_subscriptionmcount[(int)$key] = $value->pluck('subscription_price')->sum();
            // number_format($value->pluck('last_subscription_price')->sum(), 0, ',', ' ');
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($last_subscriptionmcount[$i])){
                $last_subscriptionArr[$i] = $last_subscriptionmcount[$i];
            }else{
                $last_subscriptionArr[$i] = 0;
            }
        }

        $subscriptionArr = array_values($subscriptionArr);
        $last_subscriptionArr = array_values($last_subscriptionArr);


        $sum_user_subscriptions = SubscriptionUser::select('id', 'subscription_price', 'created_at')
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('subscription_price');

        $sum_user_last_subscriptions = SubscriptionUser::select('id', 'subscription_price', 'created_at')
        ->whereYear('created_at', Carbon::now()->subYear()->year)
        ->sum('subscription_price');

        $users = User::all();

        if(isset($request['percentage']))
        {
            $percentage = $request['percentage'];
        }
        else
        {
            $percentage = null;
        }

        $new_user = User::whereDay('created_at', date('d'))->count();
        $new_subscribers = Subscription::whereDay('created_at', date('d'))->count();

        $today_visitors = Visitor::whereDate('created_at', Carbon::today())->count();
        $visitors = Visitor::count();

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

        //get Application Balance
        $headers1 = [
            'Authorization' => "Token $token",
            'Content-Type' => 'application/json'
        ];

        $request1 = new Psr7Request('GET', 'https://campay.net/api/balance/', $headers1);
        $res1 = $client->sendAsync($request1)->wait();
        $obj1 = json_decode($res1->getBody());
        $balance = $obj1->total_balance;


        return view('dashboard', compact(
            'documents',
            'p_book',
            'p_paper',
            'days',
            'subs',
            'count_subs',
            'week_growth',
            'downloads',
            'down_growth',
            'numb',
            'exams',
            'classrooms',
            'subjects',
            'members',
            'suscribers',
            'admins',
            'subscriptionArr',
            'last_subscriptionArr',
            'sum_user_subscriptions',
            'sum_user_last_subscriptions',
            'users',
            'percentage',
            'new_user',
            'new_subscribers',
            'today_visitors',
            'visitors',
            'balance',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
