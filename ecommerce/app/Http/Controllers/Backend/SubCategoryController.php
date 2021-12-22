<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categorys  = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategorys =  SubCategory::latest()->get();

        return view('backend.category.subcategory_view', compact('subcategorys', 'categorys'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_bn' => 'required',
            ],
            [
                'category_id.required' => 'Input Category Id',
                'subcategory_name_en.required' => 'Input Subcategory English Name',
                'subcategory_name_bn.required' => 'Input Subcategory Bengali Name',
            ]
        );
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->subcategory_name_bn)),
        ]);

        $notification = array(
            'message' => 'SubCategory Uploaded Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function subCategoryEdit($id)
    {
        $categorys  = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategorys =  SubCategory::findOrFail($id);

        return view('backend.category.subcategory_edit', compact('subcategorys', 'categorys'));
    }

    public function subCategoryUpdate(Request $request)
    {
        $id = $request->category_id;
        $sub_category_id = $request->id;

        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_bn' => 'required',
            ],
            [
                'category_id.required' => 'Input Category Id',
                'subcategory_name_en.required' => 'Input Subcategory English Name',
                'subcategory_name_bn.required' => 'Input Subcategory Bengali Name',
            ]
        );
        SubCategory::findOrFail($sub_category_id)->update([
            'category_id' => $id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->subcategory_name_bn)),
        ]);



        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subCategory')->with($notification);
    }

    public function subCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }
}
