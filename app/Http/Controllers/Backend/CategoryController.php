<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $search = $request->input('search', ''); // Get search query

        // Fetch categories based on search input
        $categories = Category::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%$search%");
            })
            ->latest()
            ->paginate($perPage === 'all' ? Category::count() : (int) $perPage); // Handle 'all' option

        return view('backend.vehicle-management.categories.list', compact('categories', 'perPage', 'search'));
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
