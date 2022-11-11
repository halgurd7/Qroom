<?php

namespace App\Http\Controllers;

use App\Models\Costumer_Contract;
use App\Models\Costumer_Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Contracts extends Controller
{
    public function create(){
        return view('Contracts.contract');
    }

    public function store(Request $request){
        // Calculating The Prepayment
        $date_1 = $request->input('valid_from');
        $date_2 = $request->input('valid_to');
        $quantity = $request->input('user_quantity');
        $monthly_payment = $request->input('monthly_payment');

        // Result of Prepayment
        $prepayment = (((floor((strtotime($date_2)-strtotime($date_1))/ (24*60*60)))*(double)$quantity)*(double)$monthly_payment)/2;
        
        // Validating The Fields
        $formFields = $request->validate([
            'valid_from'=>['required'],
            'valid_to'=>['required'],
            'monthly_payment'=>['required'],
            'user_quantity'=>['required'],
            'note'=>['required']
        ]);
        // To Connect User And Listing Relationship
        $formFields['user_id'] = auth()->id();
        $formFields['prepayment']= $prepayment;

        // Creating The Row
        Costumer_Invoice::create([
            'user_id'=>auth()->id(),
            'invoice_date'=>Carbon::now(),
            'done'=>true
        ]);

        Costumer_Contract::create($formFields);
        return redirect("/")->with('message','Listing created Successfully');
    }

    //Manage Contract
    public function manage(Costumer_Contract $costumer_contract){
        return view('Contracts.show_contract',['contract' => $costumer_contract->find(auth()->user()->id)]);
    }

    //Edit Contract
    public function edit(Costumer_Contract $costumer_contract){
        return view('Contracts.edit_contract',['contract' => $costumer_contract->find(auth()->user()->id)]);
    }

    //Update Contracts
    public function update(Request $request,Costumer_Contract $costumer_contract){
        // Calculating The Prepayment
        $date_1 = $request->input('valid_from');
        $date_2 = $request->input('valid_to');
        $quantity = $request->input('user_quantity');
        $monthly_payment = $request->input('monthly_payment');

        // Result of Prepayment
        $prepayment = (((floor((strtotime($date_2)-strtotime($date_1))/ (24*60*60)))*(double)$quantity)*(double)$monthly_payment)/2;

        // Validating The Fields
        $formFields = $request->validate([
            'valid_from'=>['required'],
            'valid_to'=>['required'],
            'monthly_payment'=>['required'],
            'user_quantity'=>['required'],
            'note'=>['required']
        ]);

        $formFields['prepayment']= $prepayment;

        // Updating The Row
        $costumer_contract->find(auth()->user()->id)->update($formFields);
        return back()->with('message','Contract Updated Successfully');
    }

    //Destroy Contract
    public function destroy(Request $request,Costumer_Contract $costumer_contract){
        dd($request->all());
        $costumer_contract->find(auth()->user()->id)->delete();
        return redirect('/')->with('message','Contract Deleted Successfully');
    }

    //Show Invoice Page
    public function show (){
        $invoices = auth()->user()->costumer_invoice()->get();
        return view("Contracts.invoice",['invoices'=>$invoices]);
    }
}