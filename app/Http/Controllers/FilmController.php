<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FilmRepository;


class FilmController extends Controller
{

    public function __construct(FilmRepository $films)
    {
        $this->film = $films;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function paginate()
    {
       return $this->films->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|min:11',
            'rating' => 'required',
            'price' => 'required',
            'country' => 'required',
            'photo' => 'required',
        ]);

        $film = $this->user->adminAddCustomer($request->all());

        if ($film) {
            $response = array(
                'message' => 'Film added Successful',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
            $response = array(
                'message' => 'Could Not Create Film',
                'alert-type' => 'error'
            );
          return response()->json($response, $code);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request){
        $picUrl='';

        // $this->validate($request, [
        //      'pic' => 'file|image|mimes:jpeg,png,gif'
        // ]);

        //dd($request);

        if ($request->pic) {
           $pic = $request->file('pic');
           $extension = $request->file('pic')->getClientOriginalExtension();
           $filename  = 'film-photo-' . time() . '.' . $extension;
           $picUrl = $pic->storeAs('/public/photos', $filename, 'public');
          // $picUrl = Cloudder::show(Cloudder::getPublicId(),["width"=>$width, "height"=> $height]);
        }

        return '/'.$picUrl;
   }
}
