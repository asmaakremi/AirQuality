<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\SensorValues;


use Illuminate\Http\Request;

class SensorValuesController extends Controller
{
    public function showLastValues(Request $request){
        $value = DB::table('sensor_values')->orderByDesc('id')->first();
        $timeNow= date('d-m-Y', strtotime($value->created_at));
        $location=$value->location;
        $temperature=$value->temperatureValue; 
        $humidity =$value->humidityValue;
        return view("home")->with([
            'timeNow'=>$timeNow, 
            'location'=>$location,
            'temperature'=>$temperature, 
            'humidity'=>$humidity,
        ]);
    } 
    public function showLastValuesApi(Request $request){
        $value = DB::table('sensor_values')->orderByDesc('id')->first();
        $timeNow= date('d-m-Y', strtotime($value->created_at));
        $location=$value->location;
        $temperature=$value->temperatureValue; 
        $humidity =$value->humidityValue;
        return response()->json($value, 200);
    }
   
    

     public function store(Request $request )
    {
        //dd($request->temperature, $request->humidity);
         $validator = Validator::make($request->all(), [
             'humidity' => 'required',
             'temperature' => 'required'
         ]);
         if ($validator->fails()) {
             $error = $validator->getMessageBag()->getMessages();
             return response()->json(['Error' => $error]);
         }

        try {
            $values = new SensorValues;
              $values->temperatureValue= $request->input('temperature');
              $values->humidityValue = $request->input('humidity');
              $values->location = "Sousse";
            $values->save();
             
            return response()->json(
                array(
                'success' => true,
                    'message' => 'Values added',
                    'created_values' => $values
                 ),
             200
            );
         } catch (\Exception $exception) {
             return response([
                 'success' => false,
                 'message' => $exception->getMessage()
            ]);
       }
    
}

}

