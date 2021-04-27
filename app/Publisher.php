<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "Publisher";
    protected $primaryKey = "publisherId";
    protected $fillable = [

                'publisherName',
                'publisherAddress',
                'publisherPhone',
                'publisherEmail'
            
                
    ];

public $timestamps = false;

    public function selectPublisher()
    {
        $query = Publisher::Select()->orderby('publisherName')->get();
        return $query;
    }

}