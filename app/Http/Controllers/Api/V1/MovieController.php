<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return response()->json($movies, 200);
    }

    public function store(Request $request)
    {
        $movies = Movie::create($request->all());
        return response()->json($movies, 201);
    }

    public function show(Movie $movie)
    {
        return response()->json($movie, 200);
    }

    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
        return response()->json($movie, 200);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(null, 204);
    }
}

/* class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(15);
        return $movies;
    }

    public function store(MovieRequest $request)
    {
        $validated = $request->validated();
        $movies = Movie::create($validated);
        return response()->json($movies, 201);
    }

    public function show(Movie $movie)
    {
        return response()->json($movie, 200);
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        $validated = $request->validated();
        $movie->update($validated);
        return response()->json($movie, 200);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(null, 204);
    }
}
 */
