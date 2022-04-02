<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
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


    // sub sub category controller

    public function subSubCategoryView()
    {

        $categorys  = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_subcategorys =  SubSubCategory::latest()->get();

        return view('backend.category.sub_subcategory_view', compact('sub_subcategorys', 'categorys'));
    }

    public function getSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();

        return json_encode($subcat);
    }

    public function getSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('sub_category_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();

        return json_encode($subsubcat);
     }

    public function subSubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_bn' => 'required',
            ],
            [
                'category_id.required' => 'Input Category Id',
                'subcategory_id.required' => 'Input Sub Category Id',
                'subsubcategory_name_en.required' => 'Input  SubSubcategory English Name',
                'subsubcategory_name_bn.required' => 'Input  Sub Subcategory Bengali Name',
            ]
        );
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_bn)),
        ]);

        $notification = array(
            'message' => 'SubSubCategory Uploaded Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function subSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);

        return view('backend.category.sub_subcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));
    }

    public function subSubCategoryUpdate(Request $request)
    {
        $subsubcat_id = $request->id;

        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_bn' => 'required',
            ],
            [
                'category_id.required' => 'Input Category Id',
                'subcategory_id.required' => 'Input Sub Category Id',
                'subsubcategory_name_en.required' => 'Input  SubSubcategory English Name',
                'subsubcategory_name_bn.required' => 'Input  Sub Subcategory Bengali Name',
            ]
        );

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_bn)),
        ]);

        $notification = array(
            'message' => 'SubSubCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subSubCategory')->with($notification);
    }

    public function subSUbCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
