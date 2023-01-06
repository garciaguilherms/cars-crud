<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\CarHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;


class CarController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->get('term');
        $cars = Car::with('user:id,name')
            ->where('name', 'like', '%' . $term . '%')
            ->orWhere('model', 'like', '%' . $term . '%')
            ->orWhere('year', 'like', '%' . $term . '%')
            ->orWhere('color', 'like', '%' . $term . '%')
            ->orWhereHas('user', function ($query) use ($term) {
                $query->where('name', 'like', '%' . $term . '%');
            })
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
        // $checkIfExistis = Car::where('name', $request->name)->exists()
        //     && Car::where('model', $request->model)->exists()
        //     && Car::where('year', $request->year)->exists()
        //     && Car::where('color', $request->color)->exists();


        // if ($checkIfExistis) {
        //     return redirect('/cars');
        // } else {

        $validated = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        $request->user()->cars()->create($validated);
        return redirect('/cars');
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
            'description' => $request->description,
        ]);
        return redirect('/cars');
    }

    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();
        return redirect()->back();
    }

    public function history(Car $car)
    {
        $cars = $car->histories()->get();

        return Inertia::render('History', [
            'cars' => $cars
        ]);
    }

    public function more(Car $car)
    {

        return Inertia::render('More', [
            'car' => $car
        ]);
    }
}
