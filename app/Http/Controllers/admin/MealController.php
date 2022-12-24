<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meals = Meal::all();
        return view("admin.meals.index", compact("meals"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view("admin.meals.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => "required|string|min:3|max:25",
            "price" => "required|integer|min:3|max:25",
            "Ingredients" => "required|string|min:3|max:25",
            "image" => "required|image|mimes:jpg,bmp,png|max:3000",
            "category_id" => "required|integer",
        ]);

        $imageName = pathInfo($request->image->getClientOriginalName(), flags: PATHINFO_FILENAME);
        $imageExtension = $request->image->extension();
        $fullImageName = $imageName . time() . '.' . $imageExtension;

        $meals = new Meal();
        $meals->name = $request->name;
        $meals->price = $request->price;
        $meals->Ingredients = $request->Ingredients;
        $meals->image = $fullImageName;
        $meals->category_id = $request->category_id;
        $meals->save();

        $request->image->move(public_path('front/uploads'), $fullImageName);


        return back()->with("success", "success uploaded ya m3laim 👳‍♂️");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $meal = Meal::findOrFail($id);
        return view("admin.meals.edit", compact("categories", "meal"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $meals = Meal::findOrFail($id);

        $request->validate([
            "name" => "required|string|min:3|max:25",
            "price" => "required|integer|min:3|max:25",
            "Ingredients" => "required|string|min:3|max:25",
            "image" => "required|image|mimes:jpg,bmp,png|max:3000",
            "category_id" => "required|integer",
        ]);

        $this->deleteImage($meals);

        $imageName = pathInfo($request->image->getClientOriginalName(), flags: PATHINFO_FILENAME);
        $imageExtension = $request->image->extension();
        $fullImageName = $imageName . time() . '.' . $imageExtension;

        $meals = new Meal();
        $meals->name = $request->name;
        $meals->price = $request->price;
        $meals->Ingredients = $request->Ingredients;
        $meals->image = $fullImageName;
        $meals->category_id = $request->category_id;
        $meals->save();

        $request->image->move(public_path('front/uploads'), $fullImageName);
        return back()->with("success", "success updated ya m3laim 👳‍♂️");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $meals = Meal::findOrFail($id);
        $this->deleteImage($meals);
        $meals->delete();

        return back()->with("success", "success deleted ya m3laim 👳‍♂️");
    }

    private function deleteImage($meal)
    {
        $oldImage = public_path('front/uploads/' . $meal->image);
        unlink($oldImage);
    }
}
