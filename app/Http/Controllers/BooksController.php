<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use App\Publisher;
use App\Genre;
use App\Author;
use App\Books;
use Validator;
use Hash;

class BooksController extends Controller
{
    public function index(){


        $publisher = new Publisher();
        $publisher = $publisher->selectPublisher();

        $genre = new Genre();
        $genre = $genre->selectGenre();

        $author = new author();
        $author = $author->selectAuthor();

		return view('books',[
            "publisher" => $publisher,
            "genre" => $genre,
            "author" => $author,

        ]);
	}

    public function save(Request $request){
        // return request 

        $inputs =$request->all();
		$rules= array(

                'title'=>'required|max:45',
                'hardCover'=>'required|max:45|integer',
                'paperBack'=>'required|integer',
                'inStock'=>'required|integer',
                'bookPrice'=>'required',
                'publisherPublisherId'=>'required',
                'genreGenreId'=>'required',
                'authorAuthorId'=>'required',

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $books = new books();
                $books->fill($request->all());
                $books->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }
    
    public function booksList(){
     
        // $authorList = Author::Select()->get();

        $booksList = New Books();
        $booksList = $booksList->selectBooks();


        // return $authorList;

        
        return view('books-list', [

                            "booksList" => $booksList,
            
                                    ]);

    

    }

    public function booksEdit($id)
    {
	$edit = Books::find($id);
  
    $publisher = new Publisher();
    $publisher = $publisher->selectPublisher();

    $genre = new Genre();
    $genre = $genre->selectGenre();

    $author = new Author();
    $author = $author->selectAuthor();

	return view('books-edit',[

        "booksEdit" => $edit,
        "publisher" => $publisher,
        "genre" => $genre,
        "author" => $author,
      
     ]);
    }

    public function booksEditPost(Request $request){
        // return request 
        $booksSaveEdit = Books::find($request->BooksId);
        $inputs =$request->all();
		$rules= array(

                'title'=>'required|max:45',
                'hardCover'=>'required|max:1|integer',
                'paperBack'=>'required|integer|max:1 ',
                'inStock'=>'required|integer|max:1',
                'bookPrice'=>'required|integer',
                'publisherPublisherId'=>'required',
                'genreGenreId'=>'required',
                'authorAuthorId'=>'required',

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

               
                $booksSaveEdit->fill($request->all());
                $booksSaveEdit->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }
    public function booksDeletePost(Request $request)
	{
		$deleteBooks = Books::find($request->BooksId)->delete();

		return redirect('books-list');
	}
}
