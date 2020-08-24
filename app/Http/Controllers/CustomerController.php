<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Customer;
use App\Mail\WelcomeMail;


class CustomerController extends Controller
{
    public function index(Request $request){

        $customers = Customer::where('active', $request->query('active', 1))->get();

        return view('customer.index', compact('customers'));
    }

    public function create(){

        $customer = new Customer;

        return view('customer.create', compact('customer'));

    }

    public function Store(){

        $customer =  Customer::create($this->validateData());

        Mail::to($customer->email)->send(new WelcomeMail());


        return redirect('/customers/'. $customer->id);
    }

    public function show(Customer $customer){
        return view('customer.show', compact('customer'));
    }
    
    public function edit(Customer $customer){
        return view('customer.edit' , compact('customer'));
    }

    public function update(Customer $customer){
        Customer::create($this->validateData());
        Mail::
        $customer->update($data);

        return redirect('/customers');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect('/customers');
    }

    public function validateData(){
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }

}
