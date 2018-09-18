<?php
namespace App\Repositories;

use App\Film;
use App\Genre;

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
       return $this->films->paginate(1);
   }

   public function getSlug($text)
   {
       return $this->slugIt($text);
   }

   public function createFilm($data, $session = null)
   {
       //dd($data);
       DB::beginTransaction();
       
       $film = Customer::create([
           'title' => ucfirst($data['name']),
           'description' => $data['email'],
           'release_date'  => $data['date'],
           'rating' => $data['rating'],
           'pricing'   => $data['pricing'],
           'country_id' => $data['country'],
           'photo' => $data['photo'],
       ]);

        // Add Genre to a Film
        foreach($data['genre'] as $g){
            if(!Role::where('name', $g )){
                Genre::create([
                    'name' => $g
                ]);
            }
           $film
          ->genres()
          ->attach(Role::where('name', $g )->first()); 
        }
        
        if (!$film) {
            DB::rollback();
            return false;
        }
      
       
       DB::commit();

       return $film;
   }


}