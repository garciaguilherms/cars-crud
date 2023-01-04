<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\User;
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


        $user = $request->user()
            ? $request->user()->only('id', 'name', 'email')
            : null;

        return Inertia::render('Index', [
            'cars' => $cars,
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $checkIfExistis = Car::where('name', $request->name)->exists()
            && Car::where('model', $request->model)->exists()
            && Car::where('year', $request->year)->exists()
            && Car::where('color', $request->color)->exists();


        if ($checkIfExistis) {
            return redirect('/cars');
        } else {
            $car = new Car();
            $car->name = $request->name;
            $car->model = $request->model;
            $car->year = $request->year;
            $car->color = $request->color;
            $car->save();
            return redirect('/cars');
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
        return redirect()->back();
    }
}
