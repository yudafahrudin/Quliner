<?php

namespace App\Http\Controllers\Admin\Foodhome;

use App\Foodhome;
use App\FoodhomeImage;
use App\Categorie;
use Image;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Foodhome as FoodhomeCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;

class FoodhomeController extends Controller {

    use UploadImage;
    
    public function index() {
        $foodhome = Foodhome::orderBy('created_at')->get();
        return view('admin.foodhomes.list', array(
            'foodhomes' => $foodhome,
            'listNomor' => 1,
            'title' => 'Rumah Makan')
        );
    }

    public function create() {  
        $categorie = Categorie::all();
        return view('admin.foodhomes.add', array(
            'title' => 'Add Rumah Makan', 'categories' => $categorie)
        );
    }

    public function store(Request $request) {

        $validator = $request->validate([
            'categorie_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'map_x' => 'required',
            'map_y' => 'required',
            'range' => 'required|string|max:200',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:3024',
        ]);

        $result = $this->query(null, $request);
        if ($result) {
            return redirect()->back()->with(['message' => 'Foodhome [' . $request->name . '] created.', 'status' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Something error when sending to server!', 'status' => 'error']);
        }
    }
    
    protected function edit($id, Request $request) {
        $validator = $request->validate([
            'categorie_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'map_x' => 'required',
            'map_y' => 'required',
            'range' => 'required|string|max:200',
        ]);
            $result = $this->query($id, $request);
            if ($result) {
                return response()->json($this->messageData('success', 'Foodhome [' . $request->name . '] updated.'));
            } else {
                return response()->json($this->messageData('error', 'Internal Server Error'));
            }
        }
  
    
    protected function query($id = null, $request = null) {
        if ($id == null) {
            $foodhome = new Foodhome;
            $this->saveImage($request);
            $foodhome->name = object_get($request, 'name');
            $foodhome->address = object_get($request, 'address');
            $foodhome->map_x = object_get($request, 'map_x');
            $foodhome->map_y = object_get($request, 'map_y');
            $foodhome->description = object_get($request, 'description');
            $foodhome->url = str_replace(" ","-",object_get($request, 'name'));
            $foodhome->range = object_get($request, 'range');
            $foodhome->categorie_id = object_get($request, 'categorie_id');
        } else {
            $foodhome = Foodhome::find($id);
            $foodhome->name = object_get($request, 'name');
            $foodhome->address = object_get($request, 'address');
            $foodhome->map_x = object_get($request, 'map_x');
            $foodhome->map_y = object_get($request, 'map_y');
            $foodhome->description = object_get($request, 'description');
            $foodhome->range = object_get($request, 'range');
            $foodhome->categorie_id = object_get($request, 'categorie_id');
        }
        $result = $foodhome->save();

        //Sync images table
        $foodhomeDB = DB::table('foodhomes')->latest('id')->first();
        $foodhome = Foodhome::find($foodhomeDB->id);
        $urlImage = array_get($this->pathQuality, 'original');
        $foodhome->images()->create(['url' => $urlImage]);
        return $foodhome;
    }

    public function detail($code) {
        $foodhome = Foodhome::where('id', $code)->first();
        $image = $foodhome->images;
        foreach ($image as $value){
            $imagesCollection =  $value->url;
        }

        return view('admin.foodhomes.detail', array(
            'foodhome' => $foodhome,
            'image' => $imagesCollection,
            'title' => 'Detail Foodhome')
        );
    }

}
