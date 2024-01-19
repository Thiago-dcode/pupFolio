<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Breed::all();
        return response()->json(['breeds' => $breeds], 200);
    }
    public function show($name)
    {
        try {
            $breed = Breed::where('name', $name)->firstOrFail();
            return response()->json(['breed' => $breed], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Breed not found'], 404);
        }
    }
}
