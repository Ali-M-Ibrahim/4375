<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetails;
use App\Models\Reader;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    function getBooksFromAuthor()
    {
        //select * from author where id=1;
        $author= Author::find(1);
        $relatedBooks= $author->getBooks;
        return $relatedBooks;
    }

    function getAuthorFromBook()
    {
        //select * from books where id=1;
        $book= Book::find(1);
        $relatedAuthor = $book->getAuthor;
        return $relatedAuthor;
    }

    function getDetailsFromBook(){
        //select * from book where id=1
        $book= Book::find(1);
        $details = $book->getDetails;
        return $details;

    }

    function getBookFromDetail()
    {
        //select * from bookdetails where id=1;
        $details = BookDetails::find(1);
        $book = $details->getBook;
        return $book;

    }

    function getBooksFromReader(){
        //select * from reader where id=1
        $reader = Reader::find(1);
        $books= $reader->getBooks;
        return $books;
    }

    function getReadersFromBook(){
        $book = Book::find(2);
        $readers= $book->getReaders;
        return $readers;
    }
}
