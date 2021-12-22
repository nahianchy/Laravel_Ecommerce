<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $categorys =  Category::latest()->get();
        return view('backend.category.category_view', compact('categorys'));

    }

    public function categoryStore(Request $request)
    {
        // dd('hello');
        $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_bn' => 'required',
                'category_icon' => 'required',
            ],
            [
                'category_name_en' => 'Input category English Name',
                'category_name_en' => 'Input category Bengali Name',
            ]
        );
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ', '-', $request->category_name_bn)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Uploaded Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function categoryUpdate(Request $request)
    {
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => strtolower(str_replace(' ', '-', $request->category_name_bn)),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Uploaded Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
        
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
        
    }
}
