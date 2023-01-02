<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->get('term');
        $cars = Car::where('name', 'like', '%' . $term . '%')
            ->orWhere('model', 'like', '%' . $term . '%')
            ->orWhere('year', 'like', '%' . $term . '%')
            ->orWhere('color', 'like', '%' . $term . '%')
            ->get();

        return Inertia::render('Index', [
            'cars' => $cars
        ]);
    }

    public function store(Request $request)
    {
        $checkerName = Car::where('name', $request->name)->exists();
        $checkerModel = Car::where('model', $request->model)->exists();
        $checkerYear = Car::where('year', $request->year)->exists();
        $checkerColor = Car::where('color', $request->color)->exists();

        if ($checkerName && $checkerModel && $checkerYear && $checkerColor) {
            return redirect('/cars')->with('error', 'Car already exists!');
        } else {
            $car = new Car();
            $car->name = $request->name;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->save();
            return redirect('/cars')->with('success', 'Car added successfully!');
        }
    }


    public function edit(Car $car)
    {
        return Inertia::render('EditCar', [
            'car' => $car,
        ]);
    }

    public function update(Request $request, Car $car)
    {
        $car->update([
            'name' => $request->name,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
        ]);
        return redirect('/cars');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }
}
