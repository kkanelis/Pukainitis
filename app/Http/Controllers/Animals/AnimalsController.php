<?php

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\AnimalMatch;
use App\Services\AnimalLikeService;
use Illuminate\Support\Facades\Auth;

class AnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            abort(404);
        }

        $matchedAnimalIds = AnimalMatch::all()
            ->where('user_id', $user->id)
            ->pluck('animal_id')
            ->toArray();

        $animals = Animal::whereNotIn('id', $matchedAnimalIds)
            ->get()
            ->sortByDesc(function ($animal) use ($user) {

                $matches = 0;

                if ($user->animal_type && $animal->animal_type === $user->animal_type) {
                    $matches += 5;
                }

                if ($user->activity_level && $animal->activity_level === $user->activity_level) {
                    $matches++;
                }

                if ($user->social_level && $animal->social_level === $user->social_level) {
                    $matches++;
                }

                if ($user->sleep_type && $animal->sleep_type === $user->sleep_type) {
                    $matches++;
                }

                if ($user->life_style && $animal->life_style === $user->life_style) {
                    $matches++;
                }

                if ($user->temperament && $animal->temperament === $user->temperament) {
                    $matches++;
                }

                if ($user->adventure_level && $animal->adventure_level === $user->adventure_level) {
                    $matches++;
                }

                return $matches;

            })->values();

        return view("animals.index", compact("animals"));
    }

    public function like(Request $request, AnimalLikeService $validator) {
        $animalMatch = $validator->validateLikeStore($request->all());
        $createdMatch = AnimalMatch::create([
            'user_id' => Auth::id(),
            'animal_id' => $animalMatch['animal_id']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
