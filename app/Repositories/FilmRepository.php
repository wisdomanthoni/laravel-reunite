<?php
namespace App\Repositories;

use App\Film;
use App\Genre;
use DB;
use Auth;

class FilmRepository extends BaseRepository
{
   // Define basic initialization properties
    /**
     * @param User $user
     */
    public function __construct (Film $film) {
        $this->films = $film;
   }

    public function all()
   {
       return $this->films->get();
   }

   public function paginate()
   {
       return $this->films->simplePaginate(1);
   }

   public function getSlug($text)
   {
       return $this->slugIt($text);
   }

   public function addFilm($data, $session = null)
   {
       //dd($data);
       DB::beginTransaction();

       
       $film = Film::create([
           'user_id' => $data['user'],
           'title' => ucfirst($data['title']),
           'description' => $data['description'],
           'release_date'  => $data['date'],
           'rating' => $data['rating'],
           'price'   => $data['price'],
           'country_id' => $data['country'],
           'photo' => $data['photo'],
           'slug' => $this->getSlug(ucfirst($data['title']))
       ]);

        // Add Genre to a Film
        foreach($data['genres'] as $g){
            if(!Genre::where('name', $g )){
                Genre::create([
                    'name' => $g
                ]);
            }
           $film
          ->genres()
          ->attach(Genre::where('name', $g )->first()); 
        }
        
        if (!$film) {
            DB::rollback();
            return false;
        }
      
       
       DB::commit();

       return $film;
   }


}