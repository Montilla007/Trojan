<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Illuminate\Support\Carbon;

class ClassroomController extends Controller
{
    

public function index()
{
    // Retrieve all classrooms
    $classrooms = Classroom::all();

    // Current time
    $currentTime = Carbon::now()->toDateTimeString();

    // Merge the current time with the classrooms data
    $responseData = [
        'current_time' => $currentTime,
        'classrooms' => $classrooms,
    ];

    // Return the data as a JSON response
    return response()->json($responseData);
}

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'occupancy_status' => 'required|string',
            'description' => 'required|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Find the classroom by ID
        $classroom = Classroom::findOrFail($id);

        // Update the classroom with the validated data
        $classroom->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Classroom updated successfully', 'data' => $classroom], 200);
    }
}
