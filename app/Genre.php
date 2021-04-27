<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "Genre";
    protected $primaryKey = "genreId";
    protected $fillable = [

                'type'
                
            
                
    ];

public $timestamps = false;

    public function selectGenre()
    {
        $query = Genre::Select()->orderby('genreId')->get();
        return $query;
    }

    public function genreList(){
     
        // $paymentList = Payment::Select()->get();

        $genreList = New Genre();
        $genreList = $genreList->selectGenre();


        // return $paymentList;

        
        return view('genre-list', [

                            "genreList" => $genreList,
            
                                    ]);

    }


}