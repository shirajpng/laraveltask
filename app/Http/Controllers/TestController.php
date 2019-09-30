<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TestController extends Controller
{
    public function index(){
        $rows = [];
        if(file_exists(storage_path('app\test.csv'))){
            $fp = fopen(storage_path('app\test.csv'), 'r');
            while(!feof($fp)){
                $rows[] = fgetcsv($fp);
            }
            $keys = array_shift($rows);
            array_pop($rows);
            $rowcollection = new Collection($rows);
            //for pagination
            //Get current page form url e.g. &page=1
            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            //Slice the collection to get the items to display in current page
//            $perPageItems = $rows->array_slice(($currentPage - 1) * 10, 10);
            $rows = new LengthAwarePaginator($rowcollection->chunk(10)[$currentPage-1], count($rows), 10);
        }
        return view('list', compact('keys', 'rows'));
    }
    public function store(Request $request){

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

    public function show($id){
        $fp = fopen(storage_path('app\test.csv'), 'r');
        $i = 0;


        while(! feof($fp))  {
            $result = fgets($fp);
            if($i == 0){
                $heads = str_replace('\n','',$result);
                $heads = explode(',',$heads);
            }
            if($i == $id){
                $result = str_replace('"','',$result);
                $result = str_replace('\n','',$result);
                $result = explode(',',$result);
                break;
            }
            $i++;
        }
        fclose($fp);
        return view('show', compact('result', 'heads'));
    }
}
