<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    //show all users in a paginated format
    public function index(){
        $users = [];
        $headings = [];

        //check if file exists
        if(file_exists(storage_path('app\users.csv'))){
            $fp = fopen(storage_path('app\users.csv'), 'r');

            //collecting all users
            while(!feof($fp)){
                $users[] = fgetcsv($fp);
            }

            //shift first element of array and return it
            $headings = array_shift($users);

            //Remove last element of array
            array_pop($users);

            //converting array to collection for integration pagination
            $usersCollection = new Collection($users);

            //for pagination
            //Get current page form url e.g. &page=1
            $currentPage = LengthAwarePaginator::resolveCurrentPage();

            //Slice the userCollection to get the users to display in current page
            $users = new LengthAwarePaginator($usersCollection->chunk(10)[$currentPage-1], count($usersCollection), 10);
        }
        return view('user.index', compact('headings', 'users'));
    }

    //store user to file
    public function store(Request $request){

        $user = $request->except('_token');

        //checking for file existence to ensure header placement and store new users
        if(file_exists(storage_path('app\users.csv'))){
            $fp = fopen(storage_path('app\users.csv'), 'a');
            fputcsv($fp, array_values($user), ',');
            fclose($fp);
        } else {
            $fp = fopen(storage_path('app\users.csv'), 'wb');
            fputcsv($fp, array_keys($user), ',');
            fputcsv($fp, array_values($user), ',');
            fclose($fp);
        }
        return back()->with('message',
            'User Added Successfully!'
        );
    }

    //show individual user details
    public function show($id){

        //open file for reading
        $fp = fopen(storage_path('app\users.csv'), 'r');
        $index = 0;
        while(! feof($fp))  {
            $user = fgets($fp);
            if($index == 0){
                //get titles
                $headings = str_replace('\n','',$user);

                //convert user detail from string to array
                $headings = explode(',',$headings);
            }
            if($index == $id){
                //string formatting to remove characters
                $user = str_replace('"','',$user);
                $user = str_replace('\n','',$user);

                //convert user detail from string to array
                $user = explode(',',$user);
                break;
            }
            $index++;
        }
        fclose($fp);
        return view('user.show', compact('user', 'headings'));
    }
}
