<?php

namespace App\Http\Controllers;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller



{
  

  public function __construct(){
    $this->middleware('auth')->except(['index','show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
       */

       
    public function index()
    {
        if(request()->has('type')){
          $cars = Car::where('type', request('type'))->paginate(8)->appends('type', request('type'));
        }else if(request()->has('search')){
          $search = request()->get('search');
          $cars = Car::where('make', 'like', '%'.$search.'%')->
          orWhere('model', 'like', '%'.$search.'%')->
          orWhere('year', 'like', '%'.$search.'%')->orWhere('type', 'like', '%'.$search.'%')->paginate(8);
        }else{
          $cars = Car::paginate(8);
        }
     
 
        return view('cars.index', compact('cars'));
    }

    public function sortCars(Request $request)
{
    $sortBy = $request->input('sort');

    $query = Car::query();

    switch ($sortBy) {
        case 'price_low_to_high':
            $query->orderBy('price', 'asc');
            break;
        case 'price_high_to_low':
            $query->orderBy('price', 'desc');
            break;
        case 'year_low_to_high':
            $query->orderBy('year', 'asc');
            break;
        case 'year_high_to_low':
            $query->orderBy('year', 'desc');
            break;
        case 'created_at':
            $query->orderBy('created_at', 'desc');
            break;
        default:
            // Default sorting: Most Relevant
            $query->orderBy('relevance_column', 'desc');
            break;
    }

    $car = $query->get();

    return view('cars.index', compact('cars'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
          // THIS IS STORE METHOD
          public function store(Request $request)
          {
              // Validate the form data
              $validatedData = $request->validate([
                  'make' => 'required',
                  'model' => 'required',
                  'year' => 'required|numeric',
                  'mileage' => 'required|numeric',
                  'description' => 'required',
                  'fueltype' => 'required',
                  'drivetype' => 'required',
                  'engine' => 'required',
                  'price' => 'required|numeric',
                  'type' => 'required',
                  'transmission' => 'required',
                  'doors' => 'required|numeric',
                  'image1' => 'required|image',
                  'image2' => 'required|image',
                  'image3' => 'required|image',
                  'image4' => 'required|image',
                  'features' => 'nullable|array',
                  'features.*' => 'nullable|in:air-conditioning,power-windows,power-locks,keyless-entry,backup-camera,navigation-system,sunroof,heated-seats,ventilated-seats,leather-seats',
              ]);
          
              $image1Path = Storage::putFile('public/images', $request->file('image1'));
              $image2Path = Storage::putFile('public/images', $request->file('image2'));
              $image3Path = Storage::putFile('public/images', $request->file('image3'));
              $image4Path = Storage::putFile('public/images', $request->file('image4'));
              


          
              // Create a new car instance
              $car = new Car();
              $car->make = $validatedData['make'];
              $car->model = $validatedData['model'];
              $car->year = $validatedData['year'];
              $car->mileage = $validatedData['mileage'];
              $car->description = $validatedData['description'];
              $car->fueltype = $validatedData['fueltype'];
              $car->drivetype = $validatedData['drivetype'];
              $car->engine = $validatedData['engine'];
              $car->price = $validatedData['price'];
              $car->type = $validatedData['type'];
              $car->transmission = $validatedData['transmission'];
              $car->doors = $validatedData['doors'];
              $car->image1 = $image1Path;
              $car->image2 = $image2Path;
              $car->image3 = $image3Path;
              $car->image4 = $image4Path;
              $featuresString = json_encode($validatedData['features'] ?? []);
              $car->features = $featuresString;

        // Get the creation date
              $creationDate = $car->created_at;
          
              // Associate the car with the authenticated user
              $user = Auth::user();
              $user->cars()->save($car);
          
              // Redirect or perform additional actions as needed
              return redirect()->route('cars.show', $car->id)->with('success', 'Car added successfully!');
          }

          
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // THIS IS SHOW METHOD

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     // THIS IS EDIT METHOD

     

    public function edit(Car $car)
    {
      
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // THIS IS UPDATE METHOD


     public function update(Request $request, $id)
     {
         // Validate the form data
         $validatedData = $request->validate([
             'make' => 'required',
             'model' => 'required',
             'year' => 'required|numeric',
             'mileage' => 'required|numeric',
             'description' => 'required',
             'fueltype' => 'required',
             'drivetype' => 'required',
             'engine' => 'required',
             'price' => 'required|numeric',
             'type' => 'required',
             'transmission' => 'required',
             'doors' => 'required|numeric',
             'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    
             'features' => 'nullable|array',
             'features.*' => 'nullable|in:air-conditioning,power-windows,power-locks,keyless-entry,backup-camera,navigation-system,sunroof,heated-seats,ventilated-seats,leather-seats',
         ]);
     
         // Find the car by ID
         $car = Car::findOrFail($id);
     
         // Update the car data
         $car->make = $validatedData['make'];
         $car->model = $validatedData['model'];
         $car->year = $validatedData['year'];
         $car->mileage = $validatedData['mileage'];
         $car->description = $validatedData['description'];
         $car->fueltype = $validatedData['fueltype'];
         $car->drivetype = $validatedData['drivetype'];
         $car->engine = $validatedData['engine'];
         $car->price = $validatedData['price'];
         $car->type = $validatedData['type'];
         $car->transmission = $validatedData['transmission'];
         $car->doors = $validatedData['doors'];
     
         // Update the features
         $featuresString = json_encode($validatedData['features'] ?? []);
         $car->features = $featuresString;
     
         $imageNames = ['image1', 'image2', 'image3', 'image4'];

         foreach ($imageNames as $imageName) {
             if ($request->hasFile($imageName)) {
                 // Store the new image in the public directory
                 $imagePath = $request->file($imageName)->store('public/images');
                 $car->$imageName = $imagePath;
             }
         }
     
         // Save the updated car data
         $car->save();
     
         // Redirect to the updated car details page
         return redirect()->route('cars.show', $car->id);
     }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // THIS IS DELETE METHOD


     public function destroy(Car $car)
     {
         $car->delete();
         return redirect('/profile')->with('success', 'Car deleted successfully!');
     }
    
}