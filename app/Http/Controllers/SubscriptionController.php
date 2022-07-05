<?php

namespace App\Http\Controllers;

use App\Models\DocumentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = DocumentUser::all()->sortByDesc("created_at");
        $data = DocumentUser::all()->count();

        $status = null;

        return view('admin.subscriptions.index', compact( 'subscriptions', 'data', 'status'));
    }

    public function indexDay()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = DocumentUser::where('created_at', '>',now()->subDay(1))->orderBy('created_at', 'desc')->get();
        $data = DocumentUser::where('created_at', '>',now()->subDay(1))->count();

        $status = 'today';


       return view('admin.subscriptions.index', compact( 'subscriptions', 'data', 'status'));
    }

    public function indexMonth()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = DocumentUser::where('created_at', '>',now()->subMonth(1))->orderBy('created_at', 'desc')->get();
        $data = DocumentUser::where('created_at', '>',now()->subMonth(1))->count();

        $status = 'this month';

       return view('admin.subscriptions.index', compact( 'subscriptions', 'data', 'status'));
    }

    public function indexYear()
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscriptions = DocumentUser::where('created_at', '>',now()->subYear(1))->orderBy('created_at', 'desc', 'status')->get();
        $data = DocumentUser::where('created_at', '>',now()->subYear(1))->count();

        $status = 'this year';

       return view('admin.subscriptions.index', compact( 'subscriptions', 'data', 'status'));
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
