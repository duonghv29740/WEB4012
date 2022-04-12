<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesGet = Category::with('categories')
            ->withCount('products')
            ->orderBy('id', 'desc')
            ->paginate(10);
        // dd($categoriesGet);
        return view('category.index', [
            'categories' => $categoriesGet
        ]);
    }

    public function create()
    {
        $parent = Category::all();
        return view('category.create', ['parent' => $parent]);
    }

    public function store(CategoryRequest $request)
    {
        $categoryRequest = $request->all();
        $category = new Category();
        $category->name = $categoryRequest['name'];
        $category->description = $categoryRequest['description'];
        $category->status = $categoryRequest['status'];
        $category->parent_id = $categoryRequest['parent_id'];
        $category->slug = Str::slug($categoryRequest['name']) . '-' . uniqid();

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit(Category $id)
    {
        $parent = Category::all();
        return view('category.create', [
            'category' => $id,
            'parent' => $parent
        ]);
    }
    public function update(CategoryRequest $request, Category $id)
    {

        $cateUpdate = $id;
        $cateUpdate->name = $request->name;
        $cateUpdate->description = $request->description;
        $cateUpdate->status = $request->status;
        $cateUpdate->parent_id = $request->parent_id;
        $cateUpdate->slug = Str::slug($request->name) . '-' . uniqid();

        $cateUpdate->update();

        return redirect()->route('categories.index');
    }
    public function delete(Category $cate)
    {
        if ($cate->delete()) {
            return redirect()->route('categories.index');
        }
    }
}
