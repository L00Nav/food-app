<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all()->sortBy('title');

        return view('meal.index', [
            'meals' => $meals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMealRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal;

        if ($request->file('meal_photo')) {

            $name = pathinfo($meal->photo, PATHINFO_FILENAME);
            $ext = pathinfo($meal->photo, PATHINFO_EXTENSION);
    
            $path = asset('/images') . '/' . $name . '.' . $ext;
    
            if (file_exists($path)) {
                unlink($path);
            }

            $photo = $request->file('meal_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $photo->move(public_path().'/images', $file);
            $meal->photo = asset('/images') . '/' . $file;
        }

        $meal->title = $request->meal_title;
        $meal->description = $request->meal_description;

        $meal->save();
        return redirect()->route('meals-index')->with('notification', 'Meal created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(int $meal_id)
    {
        $meal = Meal::where('id', $meal_id)->first();

        return view('meal.show', ['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('meal.edit', ['meal' => $meal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealRequest  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        if ($request->file('meal_photo')) {

            $name = pathinfo($meal->photo, PATHINFO_FILENAME);
            $ext = pathinfo($meal->photo, PATHINFO_EXTENSION);
    
            $path = asset('/images') . '/' . $name . '.' . $ext;
    
            if (file_exists($path)) {
                unlink($path);
            }

            $photo = $request->file('meal_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $photo->move(public_path().'/images', $file);
            $meal->photo = asset('/images') . '/' . $file;
        }

        $meal->title = $request->meal_title;
        $meal->description = $request->meal_description;

        $meal->save();
        return redirect()->route('meals-index')->with('notification', 'Meal created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        if ($meal->photo) {
            $name = pathinfo($meal->photo, PATHINFO_FILENAME);
            $ext = pathinfo($meal->photo, PATHINFO_EXTENSION);
            $path = asset('/images') . '/' . $name . '.' . $ext;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $meal->delete();

        return redirect()->route('meals-index')->with('notification', 'Meal deleted.');
    }
}
