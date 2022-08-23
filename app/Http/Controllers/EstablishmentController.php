<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Menu;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establishments = Establishment::all()->sortBy('title');

        return view('establishment.index', [
            'establishments' => $establishments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();

        return view('establishment.create', [
            'menus' => $menus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstablishmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $establishment = new Establishment;

        $establishment->title = $request->establishment_title;
        $establishment->code = $request->establishment_code;
        $establishment->address = $request->establishment_address;
        if(is_int($request->menu_id))
            $establishment->menu = $request->establishment_menu;

        $establishment->save();
        return redirect()->route('establishments-index')->with('notification', 'Estabishment created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function show(int $establishment_id)
    {
        $establishment = Establishment::where('id', $establishment_id)->first();

        return view('establishment.show', [
            'establishment' => $establishment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function edit(Establishment $establishment)
    {
        $menus = Menu::all();

        return view('establishment.index', [
            'establishments' => $establishments,
            'menus' => $menus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstablishmentRequest  $request
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establishment $establishment)
    {
        $establishment = new Establishment;

        $establishment->name = $request->establishment_name;
        $establishment->code = $request->establishment_code;
        $establishment->address = $request->establishment_address;
        if(is_int($request->menu_id))
            $establishment->menu = $request->establishment_menu;
        else
            $establishment->menu = NULL;

        $establishment->save();
        return redirect()->route('establishments-index')->with('notification', 'Estabishment created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establishment  $establishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establishment $establishment)
    {
        $establishment->delete();
        return redirect()->route('establishments-index')->with('notification', 'Establishment deleted');
    }
}
