<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = "Books";
    protected $primaryKey = "BooksId";
    protected $fillable = [

                'title',
                'hardCover',
                'paperBack',
                'inStock',
                'description',
                'bookPrice',
                'publisherPublisherId',
                'genreGenreId',
                'authorAuthorId'
                
    ];

public $timestamps = false;

    public function selectBooks()
    {
        $query = Books::Select()->orderby('title')->get();
        return $query;
    }

    public function booksHasPublisher()
    {
        return $this->hasOne('App\Publisher','publisherId','publisherPublisherId');
    }

    public function booksHasGenre()
    {
        return $this->hasOne('App\Genre','genreId','genreGenreId');
    }

    public function booksHasAuthor()
    {
        return $this->hasOne('App\Author','authorId','authorAuthorId');
    }
}