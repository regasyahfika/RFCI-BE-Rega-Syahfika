<?php

use Illuminate\Support\Facades\Route;

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

// soal no 1
Route::get('bubblesort', function () {
    $array = [4, 9, 7, 5, 8, 9, 3];
    $count = 0; // hitung loop swap
    $data = []; // variable array
    while (swap($array)['swapped'] === true) { //looping pertama
        $swap = swap($array);
        $array = $swap['array'];
        $data[] = $swap;
        echo "[" . $swap['swap'] . "] -> " . implode(' ', $swap['array']) . "<br>";
        $count++;
    }

    echo "Jumlah Swap : " . count($data);
    return;
});

function swap($array)
{
    $count = count($array); // hitung array

    for ($i = 0; $i < $count - 1; $i++) { //looping kedua
        if ($array[$i] > $array[$i + 1]) {
            $temp = $array[$i];
            $array[$i] = $array[$i + 1];
            $array[$i + 1] = $temp;
            $data = [
                'swap' => $array[$i] . ',' . $array[$i + 1],
                'array' => $array,
                'swapped' => true
            ];
            return $data;
        }
    }
    $data = [
        'swap' => null,
        'array' => $array,
        'swapped' => false
    ];
    return $data;
}


// soal no 2
Route::get('/server', function () {
    return view('soal-2');
});

Route::post('server', function (\Illuminate\Http\Request $request) {
    // data request yang diberikan oleh user
    $data = [
        'counter' => (int)$request->input('count'),
        'X-RANDOM' => $request->header('X-RANDOM')
    ];
    // log date
    $log = '[' . \Carbon\Carbon::now()->toIso8601String() . '] Success: ' . $request->method() . ' ' . $request->fullUrl() . ' ' . json_encode($data) . "\n";
    $fp = fopen(public_path('server.log'), 'a'); //membuka file baru, ketika tidak ada akan dibuatkan
    fwrite($fp, $log);
    fclose($fp);
});
