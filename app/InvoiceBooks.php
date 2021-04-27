<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceBooks extends Model
{
    protected $table = "InvoiceBooks";
    protected $primaryKey = "iIBooksId";
    protected $fillable = [

                'iIBooksId',
                'bIInvoiceId',
                'quantity',
                'price'
                          
    ];
public $timestamps = false;


    public function selectInvoiceId($id)
    {
        $query = InvoiceBooks::Select()
        ->join("Books", "BooksId", "bIInvoiceId")
        ->where("iIBooksId", $id)
        ->get();
        return $query;
    }

}