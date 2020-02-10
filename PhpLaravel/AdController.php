<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use App\Type;
use App\Status;
use App\Day;
use App\Shedule;
use App\Location;
use App\Address;
use App\Education;
use App\Http\Requests\AdRequest;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('layouts.ads.index',[
          'ads' => Ad::orderBy('goal', 'ASC')
          -> get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ads = new Ad();
        return view('layouts.ads.create',[
          'entity' => $ads,
          'user'=>User::pluck('name','id'),
          'name_type' => Type::pluck('name','id'),
          'adsstatus' => Status::pluck('adsstatus','id'),
          'daytime' => Day::pluck('daytime','id'),
          'name_shedule' => Shedule::pluck('name','id'),
          'name_location' => Location::pluck('name','id'),
          'description' => Address::pluck('descriptions','id'),
          'name_education' => Education::pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $attributes = $request -> only(['image', 'goal', 'user_id', 'type_id', 'status_id', 'day_id', 'shedule_id', 'location_id', 'address_id', 'education_id']);
        Ad::create($attributes);
        return redirect (route('ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
          return view ('layouts.ads.edit',[
            'entity' => $ad,
            'user'=>User::pluck('name','id'),
            'name_type' => Type::pluck('name','id'),
            'adsstatus' => Status::pluck('adsstatus','id'),
            'daytime' => Day::pluck('daytime','id'),
            'name_shedule' => Shedule::pluck('name','id'),
            'name_location' => Location::pluck('name','id'),
            'description' => Address::pluck('descriptions','id'),
            'name_education' => Education::pluck('name','id'),
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(AdRequest $request, Ad $ad)
    {
        $attributes = $request -> only(['image', 'goal', 'user_id', 'type_id', 'status_id', 'day_id', 'shedule_id', 'location_id', 'address_id', 'education_id']);
        $ad->update($attributes);
        return redirect(route('ads.index',[
          'id' => $ad->id
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect(route('ads.index'));
    }


    public function remove(Ad $ad)
    {
      return view('layouts.ads.remove',[
        'entity' => $ad
      ]);
    }
}
