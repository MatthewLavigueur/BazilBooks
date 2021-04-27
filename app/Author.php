<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "Author";
    protected $primaryKey = "authorId";
    protected $fillable = [

                'authorName',
                'authorBirthday',
                'countryCountryId'
            
                
    ];

public $timestamps = false;

    public function selectAuthor()
    {
        $query = Author::Select()->orderby('authorName')->get();
        return $query;
    }

    public function authorHasCountry()
    {
        return $this->hasOne('App\Country','countryId','countryCountryId');
    }

}