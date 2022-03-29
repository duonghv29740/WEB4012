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
        $categories = Category::all();
        $categoriesGet = Category::select('*')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('category.index', ['categories' => $categoriesGet]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $categoryRequest = $request->all();
        $category = new Category();
        $category->name = $categoryRequest['name'];
        $category->description = $categoryRequest['description'];
        $category->status = $categoryRequest['status'];
        $category->slug = Str::slug($categoryRequest['name']).'-'.uniqid();

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit(Category $id)
    {
        return view('category.create', ['category' => $id]);
    }
    public function update(CategoryRequest $request, Category $id){

        $cateUpdate = $id;
        $cateUpdate->name = $request->name;
        $cateUpdate->description = $request->description;
        $cateUpdate->status = $request->status;
        $cateUpdate->slug = Str::slug($request->name).'-'.uniqid();

        $cateUpdate->update();

        return redirect()->route('categories.index');

    }
    public function delete(Category $cate) {
        if ($cate->delete()) {
            return redirect()->route('categories.index');
        }
    }
}
