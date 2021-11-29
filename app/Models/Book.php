<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /** FUNCTIONS */
    
    public static function getNewArrivals()
    {
        $newArrivals = self::limit(5)->latest()->get();
        for($i = 0; $i < 5; $i++)
            $newArrivals[$i]['authors'] = $newArrivals[$i]->authors()->get();

        return $newArrivals;
    }

    /**
     * Get 5 hot books that are being borrowed in the past month.
     */
    public static function getHotBooks()
    {
        // Subject to change
        $hotBooks = self::selectRaw('books.id, books.title, COUNT(transactions.id) as total')
            ->leftJoin('transactions', 'books.id', '=', 'transactions.book_id')
            ->groupBy('books.id', 'books.title')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        for($i = 0; $i < 5; $i++)
            $hotBooks[$i]['authors'] = $hotBooks[$i]->authors()->get();

        return $hotBooks;
    }

    public static function search($search, $genre, $status)
    {
        // select distinct books.title, books.copies_owned, sub.copies_used, books.copies_owned - sub.copies_used as copies_left
        // from (
        //     select books.id, books.title, books.published_date, books.isbn, books.created_at, books.copies_owned, count(transactions.id) as copies_used
        //     from transactions
        //     join books on transactions.book_id = books.id
        //     where transactions.status = 'unclaimed' or transactions.status = 'claimed' or transactions.status = 'pending'
        //     group by books.title
        // ) sub
        // right join books on sub.id = books.id

        // where (books.title LIKE "%%" or authors.name LIKE "%%") and genres.name LIKE "%%"
        //      and (copies_used != copies_owned or copies_used IS NULL)

        $sub = Transaction::bookSearchSub();
        
        $obj = DB::table( DB::raw("( ". $sub->toSql() .") as sub" ) )
            ->distinct('books.title')
            ->select('books.id', 'books.title', 'books.published_date', 'books.isbn','books.created_at', 'books.copies_owned', 'books.cover_url','sub.copies_used', DB::raw("books.copies_owned - sub.copies_used as copies_left") )
            ->mergeBindings( $sub->getQuery() )
            ->rightJoin('books', 'sub.id', '=', 'books.id');
        
        if($search)
        {
            $obj->where(function ($query) use ($search) {
                $query->where('books.title', 'LIKE', '%' . ($search ? $search : NULL) . '%' )
                    ->orWhere('authors.name', 'LIKE', '%' . ($search ? $search : NULL) . '%' );
            });
            
        }

        if($genre)
        {
            for($i = 0; $i < count($genre); $i++)
            {
                if($i == 0) $obj->where('genres.name', 'LIKE', '%'. $genre[$i] .'%');
                else $obj->where('genres.name', 'LIKE', '%'. $genre[$i] .'%');
            }
        }

        // Search only books that are available for transaction (borrow)
        if($status)
        {
            $obj->where(function ($query) {
                $query->whereRaw('copies_used != copies_owned')
                    ->orWhereRaw('copies_used IS NULL');
            });
        }

        $obj = $obj->get();

        // Add authors to json & set NULL cells to 0
        for($i = 0; $i < count($obj); $i++)
        {
            $obj[$i]->authors = Author::getBookAuthors($obj[$i]->id);
            
            $g = Genre::getBookGenres($obj[$i]->id);
            if(isset($g[0]->genres)) 
                $obj[$i]->genres = Genre::getBookGenres($obj[$i]->id)[0]->genres;
            else
                $obj[$i]->genres = "none";

            if($obj[$i]->copies_used == NULL)
            {
                $obj[$i]->copies_used = 0;
                $obj[$i]->copies_left = $obj[$i]->copies_owned;
            }
        }

        // Append other parameters to auto-generated page urls
        if($search) $obj->appends(['search' => $search]);
        if($genre) 
        {
            $gc = "";
            for($i = 0; $i < count($genre); $i++)
            {
                $gc .= $genre[$i];
                if($i < count($genre) - 1)
                {
                    $gc .= ", ";
                }
            }
            $obj->appends(['genre' => $gc]);
        }
        if($status) $obj->appends(['status' => $status]);
            
        return $obj;
    }
}
