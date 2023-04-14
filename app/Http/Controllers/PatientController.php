<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    private $dateFields = [
        "dob"
    ];
    public function index(){
        return view('patient.index');
    }
    public function store(Request $request){
        // after storing return back to the same page with success message or failure message
        // return redirect('patient')->with('success', 'Datat inserted successfully');
    
            try {
    
                $data = $request->all();
                $recordData = $data['r_fld'];
    
                $table = $data['table'];
                $model = 'App\Models\\' . $table;
                    
                //check if we are doing an update
                if (array_key_exists('fld_id', $data)) {
                    $record = $model::find($data['fld_id']);
                }
    
                $file = null;
                if (array_key_exists('select_file', $data)) {
                    $file = $data['select_file'];
                }
                /**
                 *  we save the record to the DB
                 **/
                $record = isset($record) ? $record : new $model();
                foreach ($recordData as $field => $value) {
                    // $value = in_array($field, $this->dateFields) ? db_date_format($value) : $value;
                    $record->$field = $value;
                }
                $record->save();
                // 0779884279
    
                $msg = $table . " successfully saved";
                return redirect('patient')->with('success', 'Datat inserted successfully');
    
            } 
            catch (\Exception $exception) {
                // return $exception;
                // return json_encode(ApiResp::failure($exception->getMessage()));
                return redirect('patient')->with('error', $exception->getMessage());
            }
    
        }
    
        public function edit(){

        }

        public function api_index(){
            $patients = Patient::all();
            return response()->json($patients);
        }
    }