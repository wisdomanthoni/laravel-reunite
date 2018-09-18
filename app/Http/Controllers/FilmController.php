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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:11',
            'address' => 'required',
            'amount' => 'required',
            'bank_account' => 'required',
            'bank' => 'required',
            'type' => 'required',
        ]);

        $customer = $this->user->adminAddCustomer($request->all());

        if ($customer) {
            $notification = array(
                'message' => 'Film added Successful',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
            $notification = array(
                'message' => 'Could Not Create Film',
                'alert-type' => 'error'
            );
          return back()->with($notification);

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
}
