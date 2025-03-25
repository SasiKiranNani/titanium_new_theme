<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:View Categories', only: ['index']),
            new Middleware('permission:Create Categories', only: ['store']),
            new Middleware('permission:Edit Categories', only: ['update']),
            new Middleware('permission:Delete Categories', only: ['delete']),
        ];
    }


    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $search = $request->input('search', ''); // Get search query
        $sortOrder = $request->input('sort_order', 'asc'); // Default sorting order

        // Fetch categories based on search input and sorting order
        $categories = Category::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->orderBy('name', $sortOrder) // Apply sorting order
            ->paginate($perPage === 'all' ? Category::count() : (int) $perPage); // Handle 'all' option

        return view('backend.vehicle-management.categories.list', compact('categories', 'perPage', 'search', 'sortOrder'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();

        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();
        return redirect()->back()->withInput()->with('success', 'Category created successfully');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        return redirect()->back()->withInput(['success' => 'Category updated successfully']);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->withInput(['success' => 'Category deleted successfully']);
    }
}
