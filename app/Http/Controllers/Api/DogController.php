<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Grab the query parameter and turn it into an array exploded by ,
        $sorts = explode(',', $request->input('sort', 'name'));

        // Create a query
        $query = Dog::query();

        // Apply any filters in the request
        $query->when(request()->filled('filter'), function ($query) {
            [$criteria, $value] = explode(':', request('filter'));
            return $query->where($criteria, $value)->paginate(2);
        });

        // Add the sorts one by one
        foreach ($sorts as $sortColumn) {
            $sortDirection = str_starts_with($sortColumn, '-') ? 'desc' : 'asc';
            $sortColumn = ltrim($sortColumn, '-');

            $query->orderBy($sortColumn, $sortDirection);
        }

        return $query->paginate(2);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Dog::create($request->only(['name', 'breed']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Dog::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return Dog::findOrFail($id)->update($request->only(['name', 'breed']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Dog::findOrFail($id)->delete();
    }
}
