<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "Invoice";
    protected $primaryKey = "invoiceId";
    protected $fillable = [

                'discount',
                'customerCustomerId',
                'paymentPaymentId',
                'created_at',
                'updated_at'
                
    ];


    
    public function selectInvoice()
    {
        $query = Invoice::Select()->orderby('invoiceId',"DESC")->get();
        return $query;
    }

    public function invoiceHasCustomer(){
        return $this->hasOne('App\Customer','customerId','customerCustomerId');
    }

    public function invoiceHAsPayment(){
        return $this->hasOne('App\Payment','PaymentId','paymentPaymentId');
    }
}