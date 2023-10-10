<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\akarkuadrat;
use Illuminate\Http\Request;

class AkarKuadratController extends Controller
{
    public function index(){
        $angkas = akarkuadrat::orderBy('id', 'desc')->get();

        // return response()->json(['data' => $angkas]);
        return view('akar_kuadrat', compact('angkas'));
    }

    public function hitung(Request $request){
        $inputValue = $request->input('p_number');

        // Call the stored procedure using Laravel's database query builder
        DB::select('CALL CalculateSquareRoot(?, @outputSquareRoot)', [$inputValue]);

        // Retrieve the output parameter from the stored procedure
        $squareRoot = DB::select('SELECT @outputSquareRoot as squareRoot')[0]->squareRoot;

        // Insert the input value and square root into the database
        //akarkuadrat::create([
        //   'angka' => $inputValue,
        //   'akar_kuadrat' => $squareRoot
        //]);

        //return response()->json([
        //    'angka' => $inputValue,
        //    'akar_kuadrat' => $squareRoot,
        //   'result' => 'Akar kuadrat dari ' . $inputValue . ' adalah ' . $squareRoot,
        //]);

        return redirect()->back();
    }
}
