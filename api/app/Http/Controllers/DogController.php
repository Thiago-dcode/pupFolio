<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DogController extends Controller
{
    public function index()
    {
        $dogs = Dog::all();
        return response()->json(['dogs' => $dogs], 200);
    }

    public function show($id)
    {
        try {
            $dog = Dog::findOrFail($id);
            return response()->json(['dog' => $dog], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Dog not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $fields = $request->validate([

                'name' => ['required', 'max:255'],
                'color' => 'required|string',
                'description' => 'required|string',
                'breed' => ['required', 'exists:breeds,id'],
                'size' => ['required', 'exists:sizes,id'],
                'image' => 'required|file',
            ]);

            // Handle file upload for image if provided
            $imagePath = '';

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Validate the uploaded file
                $allowedExtensions = ['png', 'jpg', 'jpeg'];
                $allowedMimeTypes = ['image/png', 'image/jpeg'];

                if (
                    $image->isValid() &&
                    in_array($image->getClientOriginalExtension(), $allowedExtensions, true) &&
                    in_array($image->getClientMimeType(), $allowedMimeTypes, true)
                ) {
                    // Generate a unique filename to prevent overwriting existing files
                    $uniqueFilename = uniqid($request->input('name')) . '.' . $image->getClientOriginalExtension();

                    // Store the uploaded file in the public disk under the 'dog_images' directory
                    $imagePath = $image->storeAs('dog_images', $uniqueFilename, 'public');
                } else {
                    // Handle invalid file format (not an image or unsupported format)
                    return response()->json(['error' => 'Invalid file format. Only PNG and JPEG images are allowed.'], 422);
                }
            }

            $dog = Dog::create([
                'name' => $fields['name'],
                'color' => $fields['color'],
                'description' => $fields['description'],
                'breed_id' => $fields['breed'],
                'size_id' => $fields['size'],
                'image' => $imagePath,
            ]);

            return response()->json(['dog' => $dog], 201);
        } catch (ValidationException $e) {
            // Validation failed; return an error response with validation messages
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Handle other exceptions (e.g., database errors) and return an error response
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
