<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(30);
        return view('admin.category.category-list', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.category-create');
    }


    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
        ]);

        //  Store data in database
        Category::create($request->all());

        return redirect(route('category.index'));

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
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return [
          'success' => true,
          'message' => 'حوزه کاری با موفقیت حذف شد'
        ];
    }
}
