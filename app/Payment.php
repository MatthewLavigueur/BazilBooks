<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "Payment";
    protected $primaryKey = "PaymentId";
    protected $fillable = [

                'Type'
            
                
    ];

public $timestamps = false;

    public function selectPayment()
    {
        $query = Payment::Select()->orderby('PaymentId')->get();
        return $query;
    }

}