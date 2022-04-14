<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Superhero;
use App\Race;
use App\Publisher;
use DB;

class SuperheroController extends Controller
{

    public function store()
    {
        try {

            
            $file = fopen(storage_path() . "\app\public\superheros.csv", "r");
            if ($file !== FALSE) {

                // avoid first row (headers)
                fgetcsv($file, 1000, ",");
                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    
                    $publisher = Publisher::where('name', $data[15])->first();
                    if (!$publisher && $data[15]) {
                        $publisher = new Publisher();
                        $publisher->name = $data[15];
                        $publisher->save();
                    }

                    $race = Race::where('name', $data[8])->first();
                    if (!$race && $data[8]) {
                        $race = new Race();
                        $race->name = $data[8];
                        $race->save();
                    }

                    $superhero = new Superhero();
                    $superhero->name = $data[1];
                    $superhero->full_name = $data[2];
                    $superhero->strength = $data[3];
                    $superhero->speed = $data[4];
                    $superhero->durability = $data[5];
                    $superhero->power = $data[6];
                    $superhero->combat = $data[7];
                    $superhero->race_id = $data[8] ? $race->id : null;
                    $superhero->height = $data[9];
                    $superhero->weight = $data[11];
                    $superhero->eye_color = $data[13];
                    $superhero->hair_color = $data[14];
                    $superhero->publisher_id = $data[15] ? $publisher->id : null;
                    $superhero->save();
                }

                fclose($file);
                return response()->json([
                    'message' => 'Superheros successfully added.'
                ], 201);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        } 

    }

    public function index(Request $request)
    {
        $params = $request->all();

        $name = $request->get('name');
        $power = $request->get('power');
        $speed = $request->get('speed');
        $orderBy = $request->get('orderBy') ?? 'ASC';
        $perPage = $request->get('per_page') ?? 10;

        $searchParams = array_filter(array(
            'name' => $name,
            'power' => $power,
            'speed' => $speed,
        ));

        $superheros = Superhero::orderBy('name', $orderBy);
        foreach ($searchParams as $key => $value) {
            $superheros->where($key, $value);
        }
        
        return response()->json([
            'data' => $superheros->paginate($perPage)
        ], 200);
    }
}
