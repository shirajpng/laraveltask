<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TestController extends Controller
{
    public function store(Request $request){
//        header('Content-Type: text/csv');
//        header('Content-Disposition: attachment; filename="test.csv"');

        $user = $request->except('_token');

            if(file_exists(storage_path('app\test.csv'))){
                $fp = fopen(storage_path('app\test.csv'), 'a');
                fputcsv($fp, array_values($user), ',');
                fclose($fp);
            } else {
                $fp = fopen(storage_path('app\test.csv'), 'wb');
                fputcsv($fp, array_keys($user), ',');
                fputcsv($fp, array_values($user), ',');
                fclose($fp);
            }
        return back();
    }

    public function list(){
        $rows = [];
        if(file_exists(storage_path('app\test.csv'))){
            $fp = fopen(storage_path('app\test.csv'), 'r');
            while(!feof($fp)){
                $rows[] = fgetcsv($fp);
            }
            $keys = array_shift($rows);
            array_pop($rows);
            $rows = new LengthAwarePaginator($rows,count($rows), '10');
        }
        return view('list', compact('keys', 'rows'));
    }
}
