<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Invoice;
use App\Customer;
use App\Payment;
use App\InvoiceBooks;
use App\Books;
use Validator;
use Hash;
use PDF;

class InvoiceController extends Controller
{
    public function index(){

		$customer = new Customer();
		$customer = $customer->selectCustomer();

		$payment = new Payment();
		$payment = $payment->selectPayment();


		return view('invoice', [
					
					'customer' => $customer,
					'payment' => $payment
		]);
	
}
	public function save(Request $request)
	{

		
		$inputs =$request->all();
		$rules= array(

                'customerCustomerId'=>'required',
                'paymentPaymentId'=>'required',
        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

				
		$invoice = new Invoice();
		$invoice->fill($request->all());
		$invoice->save();

		
		return redirect('invoice-'.$invoice->invoiceId);

		}
			
	}
	public function invoiceBooks($id){

		$invoice = Invoice::find($id);
		$books = new Books();
		$books = $books->selectBooks();

		$invoiceList = New Invoice();
		$invoiceList = $invoiceList->selectInvoice();

		$customer = New Customer();
		$customer = $customer->selectCustomer();

		$payment = New Payment();
		$payment = $payment->selectPayment();

		$invoiceBooks = new invoiceBooks();
		$invoiceBooks = $invoiceBooks->selectInvoiceId($id);

		return view('invoice', [

					'books' => $books,
					'customer' => $customer,	
					'invoice' => $invoice,	
					'invoiceList' => $invoiceList,	
					'payment' => $payment,	
					'invoiceBooks'=> $invoiceBooks	
		]);	
	}
	public function addBook(Request $request)
	{
		
        $inputs =$request->all();
		$rules= array(

                'quantity'=>'required|max:45',
                'price'=>'required', // regex:/^\(?([2-9][0-8][0-9])\)?[-. ]?([2-9][0-9]{2})[-. ]?([0-9]{4})$'
				'bIInvoiceId'=>'required'
               

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

			$invoiceBooks = new InvoiceBooks();

			$invoiceBooks->fill($request->all());
			$invoiceBooks->save();

			return redirect('invoice-'.$request->iIBooksId);
		}
	}
			
	public function invoiceList(){
     
		// $invoice = Invoice::find($id);
		// $invoiceList = Invoice::Select()->get();

		$invoiceList = New Invoice();
		$invoiceList = $invoiceList->selectInvoice();

		$customer = New Customer();
		$customer = $customer->selectCustomer();

		$payment = New Payment();
		$payment = $payment->selectPayment();

		// return $invoiceList;

		
		return view('invoice', [

							"invoiceList" => $invoiceList,
							"customer" => $customer,
							"payment" => $payment,
			
									]);

	}

		public function invoicePDF($id){

			
			$invoice = Invoice::find($id);
			
			$books = new Books();
			$books = $books->selectBooks();

			$invoiceBooks = new invoiceBooks();
			$invoiceBooks = $invoiceBooks->selectInvoiceId($id);
			
			$customer = New Customer();
			$customer = $customer->selectCustomer();

	
		$pdf = PDF::loadView('invoice-pdf', [
	
						'books' => $books,
						'customer' => $customer,	
						'invoice' => $invoice,	
						'invoiceBooks'=> $invoiceBooks		
			]);	

			return $pdf->download('BazilBooksInvoice.pdf');
		}		



		// //Work in progress
		// public function invoiceEdit($id){

			
		// 	$edit = invoiceBooks::find($id);
		// 	$books = new Books();
		// 	$books = $books->selectBooks();
	
		// 	$invoiceList = New Invoice();
		// 	$invoiceList = $invoiceList->selectInvoice();
	
		// 	$customer = New Customer();
		// 	$customer = $customer->selectCustomer();
	
		// 	$payment = New Payment();
		// 	$payment = $payment->selectPayment();
	
		// 	$invoiceBooks = new invoiceBooks();
		// 	$invoiceBooks = $invoiceBooks->selectInvoiceId($id);
	
		// 	return view('invoice', [
	
		// 				'invoiceEdit' => $edit,
		// 				'books' => $books,
		// 				'customer' => $customer,	
		// 				'invoice' => $invoice,	
		// 				'invoiceList' => $invoiceList,	
		// 				'payment' => $payment,	
		// 				'invoiceBooks'=> $invoiceBooks	
		// 	]);	
		// }

		// public function invoiceBooksDelete(Request $request)
		// {	
		// 	$delete = invoiceBooks::find($request->iIBooksId)->delete();

		// 	return redirect('invoice-');

		
		// }



}


