<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function store(Request $request){
//        header('Content-Type: text/csv');
//        header('Content-Disposition: attachment; filename="test.csv"');

        $user = $request->except('_token');

            if(file_exists(storage_path('app\test.csv'))){
                $fp = fopen(storage_path('app\test.csv'), 'a+');
                fputcsv($fp, array_values($user), ',');
            } else {
                $fp = fopen(storage_path('app\test.csv'), 'wb');
                fputcsv($fp, array_keys($user), ',');
                fputcsv($fp, array_values($user), ',');
            }


        fclose($fp);
        return back();
    }
}
