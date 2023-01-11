<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\BrandModel;


class CarController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->get('term');
        $cars = Car::with('user:id,name', 'brand:id,name', 'brand_model:id,name')
            ->where('year', 'like', '%' . $term . '%')
            ->orWhere('color', 'like', '%' . $term . '%')
            ->orWhere('license_plate', 'like', '%' . $term . '%')
            ->orWhereHas('brand', function ($query) use ($term) {
                $query->where('name', 'like', '%' . $term . '%');
            })
            ->orWhereHas('brand_model', function ($query) use ($term) {
                $query->where('name', 'like', '%' . $term . '%');
            })->get();

        $user = $request->user()->only('id', 'name', 'email');


        $brands = Brand::all();

        $models = BrandModel::where('brand_id', $request->brand_id)->get();

        return Inertia::render('Index', [
            'cars' => $cars,
            'user' => $user,
            'brands' => $brands,
            'models' => $models,
        ]);
    }

    public function store(Request $request)
    {
        $regex = '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/';

        $validated = $request->validate([
            'brand_id' => 'required',
            'brand_model_id' => 'required',
            'license_plate' => 'required|regex:' . $regex,
            'year' => 'required|integer|min:1900|max:2021',
            'color' => 'required',
            'description' => 'required',
        ]);

        $request->user()->cars()->create($validated);
        return redirect('/cars');
    }


    public function edit(Car $car)
    {
        $car = $car->load('user:id,name', 'brand:id,name', 'brand_model:id,name');
        $brands = Brand::all();
        $models = BrandModel::where('brand_id', $car->brand_id)->get();
        return Inertia::render('EditCar', [
            'car' => $car,
            'brands' => $brands,
            'models' => $models,
        ]);
    }

    public function update(Request $request, Car $car)
    {
        $car->update([
            'brand_id' => $request->brand_id,
            'brand_model_id' => $request->brand_model_id,
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
        $cars = $car->histories()->with('user:id,name', 'brand:id,name', 'brand_model:id,name')->get();

        return Inertia::render('History', [
            'cars' => $cars
        ]);
    }

    public function more(Car $car)
    {
        $car = $car->load('user:id,name', 'brand:id,name', 'brand_model:id,name');
        return Inertia::render('More', [
            'car' => $car
        ]);
    }

    public function storeBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Brand::create($validated);
        return redirect('/cars');
    }

    public function storeModel(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
        ]);

        BrandModel::create($validated);
        return redirect('/cars');
    }
}
