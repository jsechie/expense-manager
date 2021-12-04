<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Expense;
use App\PettyCash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class PettyCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('petty_cash_create')){
            $pettyCashes = PettyCash::where('requested_by',auth()->user()->id)->get();

            return view('admin.pettyCash.index', compact('pettyCashes'));
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->can('petty_cash_create')){
            $request->validate([
                'receipt_date' => ['required', 'date'],
                'amount' => ['required'],
                'description' => ['required', 'string'],
            ]);
            PettyCash::create([
                'receipt_date' => $request->receipt_date,
                'amount' => $request->amount,
                'description' => $request->description,
                'requested_by' => auth()->user()->id,
            ]);
            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function show(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_show')){
            $pettyCash->find($pettyCash->id);

            return view('admin.pettyCash.show', compact('pettyCash'));
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function edit(PettyCash $pettyCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PettyCash $pettyCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PettyCash  $pettyCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(PettyCash $pettyCash)
    {
        //
    }

    public function withdraw(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_show')){
            $pettyCash->update([
                'status' => 'withdrawn'
            ]);

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function approve(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCash->update([
                'status' => 'approved',
                'approved_by' => auth()->user()->id,
            ]);

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function reject(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCash->update([
                'status' => 'rejected',
                'approved_by' => auth()->user()->id,
            ]);

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function receive(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCash->update([
                'status' => 'received',
                'received_by' => auth()->user()->id,
            ]);

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function pay(PettyCash $pettyCash)
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCash->update([
                'status' => 'paid',
            ]);
            Expense::create([
                'amount'=> $pettyCash->amount,
                'description' => $pettyCash->description,
                'entry_date' => date('Y-m-d'),
                'expense_category_id' => 1,
            ]);
            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function processApprove()
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCashes = PettyCash::where('status','pending review')->get();

            return view('admin.pettyCash.approve', compact('pettyCashes'));

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function processReceive()
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCashes = PettyCash::where('status','approved')->get();

            return view('admin.pettyCash.receive', compact('pettyCashes'));

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function reimburse()
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCashes = PettyCash::where('status','received')->get();

            return view('admin.pettyCash.reimburse', compact('pettyCashes'));

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function archive()
    {
        if(auth()->user()->can('petty_cash_process')){
            $pettyCashes = PettyCash::where('status','paid')->get();

            return view('admin.pettyCash.archive', compact('pettyCashes'));

            return back();
        }
        else{
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
}
