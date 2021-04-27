<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "Country";
    protected $primaryKey = "countryId";
    protected $fillable = [

                'country'
            
                
    ];

public $timestamps = false;

    public function selectCountry()
    {
        $query = Country::Select()->orderby('country')->get();
        return $query;
    }


}