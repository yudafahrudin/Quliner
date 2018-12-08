<?php

namespace App\Http\Controllers\Admin\Category;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index() {
        $category = Categorie::all();
        return view('admin.categories.listCategory', array(
            'category' => $category,
            'listNomor' => 1,
            'title' => 'Category')
        );
    }

    public function create() {
        return view('admin.categories.addCategory', array(
            'title' => 'Add Category')
        );
    }

    protected function edit($id, Request $request) {
        $requestCollection = ['name' => $request->name];
        $validator = $this->validator($requestCollection);
        if ($validator->fails()) {
            return response()->json($this->messageData('error', $validator->messages()));
        } else {
            $result = $this->query($id, $request);
            if ($result) {
                return response()->json($this->messageData('success', 'Categorie [' . $request->name . '] updated.'));
            } else {
                return response()->json($this->messageData('error', 'Internat Server Error'));
            }
        }
    }
    
    protected function delete($id) {
        try {
            $categories = Categorie::find($id);
            $categoriesName = object_get($categories, 'name');
            $categories->delete();
            return redirect(route('admin.category.show'))->with(['message' => 'Categories [ ' . $categoriesName . ' ] deleted', 'status' => 'success']);
        } catch (ValidatorException $e) {
            return redirect(route('user.show'))->with('message', $e->getMessageBag());
        }
    }

    protected function validator(array $data) {

        $validator_requrement = [
            'name' => 'required|string|max:255',
            'code' => 'string|max:25|unique:categories',
        ];

        return Validator::make($data, $validator_requrement);
    }

    public function store(Request $request) {
            $validator = $this->validator($request->all());
            if ($validator->fails()) {
                $response = array(
                    'status' => 'error',
                    'msg' => $validator->messages(),
                );
                return redirect()->back()->with(['message' => 'Categorie [' . $request->name . '] failed', 'status' => 'error']);
            }
        $result = $this->query(null, $request);
        if ($result) {
            return redirect()->back()->with(['message' => 'Categorie [' . $request->name . '] created.', 'status' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Something error when sending to server!', 'status' => 'error']);
        }
    }

    protected function query($id = null, $request = null) {
        
        if ($id == null) {
            $categorie = new Categorie;
            $categorie->name = object_get($request, 'name');
            $categorie->code = object_get($request, 'code');
        } else {
            $categorie = Categorie::find($id);
            $categorie->name = object_get($request, 'name');
        }
        return $categorie->save();
    }

    public function messageData($status, $message) {
        return array(
            'status' => $status,
            'message' => $message,
        );
    }

    public function detail($code) {
        $categorie = Categorie::where('code', $code)->first();
        return view('admin.categories.detail', array(
            'category' => $categorie,
            'title' => 'Category')
        );
    }

}
