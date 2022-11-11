<?php

namespace App\Http\Controllers;

use App\Models\Costumer_Contract;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvoiceController extends Controller
{
    public function __invoke(Request $request)
    {
        return "Welcome to our homepage";
    }

//Show Home Page
    public function index(){

         return view('Home.index',[
                // Paginate is used for the content of the webpage, to not show it all of them at a time.
                'invoices'=>Invoice::latest()->filter(request(['search']))->paginate(6)
            ]);
    }

    //Show Single Item
    public function show(Invoice $invoice){
            return view("Home.show",[
                'invoice' => $invoice
            ]);
    }

}