<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::with('parents')->get();
        return view('backend.category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $categories = Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'active' => 1,
        ]);
        toastr()->success('Category Add Successfully');
        return redirect()->route('admin.categories');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        if(isset($request->active)) {
            $category->active = 1;
          } else {
            $category->active = 0;
          }
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
       
        toastr()->success('Category Update Successfully');
        return redirect()->route('admin.categories');
    }

    public function destroy( Category $category)
    {
        $category->delete();
        toastr()->success('Category Delete Successfully');
        return redirect()->route('admin.categories');
    }
}
