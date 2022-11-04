<?php

use Illuminate\Support\Facades\Route;
use Mockery\Undefined;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/questions', function (){
    $file = file_get_contents('./../storage/questions.json');
    $jsonData = json_decode($file, true);
    $count = ["Film & TV" => [], "Geografi" => [], "Historia" => [], "Musik" => [], "Övrigt" => [], "Vetenskap" => [], "Sport" => []];
    $questions = [];

    while (count($questions) < 35) {
        //Generates a new random number in the beginning of every loop.
        $randomNumber = rand(0, (count($jsonData) - 1));

        //Checks if the question for this loop already exists.
        if (in_array($jsonData[$randomNumber], $questions)) {
            continue;
        }
        
        //Saves the category of current question.
        $category = $jsonData[$randomNumber]["category"];

        //Checks for the current category is correct and if the index of its array is already full.
        if ($category === "Film & TV" && count($count["Film & TV"]) < 5 ) {
            array_push($count["Film & TV"], 1);
        } elseif ($category === "Film & TV"  && count($count["Film & TV"]) === 5) {
            continue;
        }

        if ($category === "Geografi" && count($count["Geografi"]) < 5 ) {
            array_push($count["Geografi"], 1);
        } elseif ($category === "Geografi"  && count($count["Geografi"]) === 5) {
            continue;
        }

        if ($category === "Historia" && count($count["Historia"]) < 5 ) {
            array_push($count["Historia"], 1);
        } elseif ($category === "Historia"  && count($count["Historia"]) === 5) {
            continue;
        }

        if ($category === "Musik" && count($count["Musik"]) < 5 ) {
            array_push($count["Musik"], 1);
        } elseif ($category === "Musik"  && count($count["Musik"]) === 5) {
            continue;
        }

        if ($category === "Övrigt" && count($count["Övrigt"]) < 5 ) {
            array_push($count["Övrigt"], 1);
        } elseif ($category === "Övrigt"  && count($count["Övrigt"]) === 5) {
            continue;
        }

      if ($category === "Vetenskap" && count($count["Vetenskap"]) < 5 ) {
          array_push($count["Vetenskap"], 1);
        } elseif ($category === "Vetenskap"  && count($count["Vetenskap"]) === 5) {
            continue;
        }

       if ($category === "Sport" && count($count["Sport"]) < 5 ) {
           array_push($count["Sport"], 1);
       } elseif ($category === "Sport"  && count($count["Sport"]) === 5) {
           continue;
       }

       //After all checks is cleared. The current questions is pushed to the questions array.
        array_push($questions, $jsonData[$randomNumber]);
    }

    // When questions array is full, the loop breaks and the array is sent back in a response.
    return response()->json($questions);
});
