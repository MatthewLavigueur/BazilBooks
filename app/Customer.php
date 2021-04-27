<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "Customer";
    protected $primaryKey = "customerId";
    protected $fillable = [

                'customerName',
                'customerPhone',
                'customerEmail',
                'customerAddress',
                'created_at',
                'updated_at'
                
    ];



    public function selectCustomer()
    {
        $query = Customer::Select()->orderby('customerName')->get();
        return $query;
    }

}