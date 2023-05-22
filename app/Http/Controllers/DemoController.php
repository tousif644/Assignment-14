<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{





    public function getName(Request $request)
    {
    //    Question 1:

    // You have a Laravel application with a form that submits user information using a POST request.
    // Write the code to retrieve the 'name' input field value from the request and store it in a variable 
    // called $name.

    //     Answer 1:
        $name = $request->input('name');

    //    Question 2:

    // In your Laravel application, you want to retrieve the value of the 'User-Agent' 
    // header from the current request. Write the code to accomplish this and store the 
    // value in a variable called $userAgent.

    //     Answer 2:
        $userAgent = $request->header('User-Agent');

        return "Answer 1: ".$name." \n Answer 2: ".$userAgent;
    }


    //    Question 3:

    //  You are building an API endpoint in Laravel that accepts a GET request with 
    //  a 'page' query parameter. Write the code to retrieve the value of the 'page' 
    //  parameter from the current request and store it in a variable called $page. 
    //  If the parameter is not present, set $page to null.

    //     Answer 3:
    public function getPage(Request $request)
    {
        if($request->has('page')){
            $page = $request->input('page');
        }else{
            $page = null;
        }        
       
        return $page;
    }


    //    Question 4:

    //Create a JSON response in Laravel with the following data:


    //     Answer 4:
    public function createJsonResponse()
    {
        $data = [
            "message" => "Success",
            "data" => [
                "name" => "John Doe",
                "age" => 25
            ]
        ];

        return response()->json($data);
    }

    //    Question 5:

    // You are implementing a file upload feature in your Laravel application.
    // Write the code to handle a file upload named 'avatar' in the current request
    // and store the uploaded file in the 'public/uploads' directory. Use the original 
    // filename for the uploaded file.

    //     Answer 5:
    public function upload(Request $request)
    {
        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            $path = $file->storeAs('public/uploads', $file->getClientOriginalName());
            return response()->json(['message' => 'File uploaded successfully', 'path' => $path]);
        }

        return response()->json(['message' => 'No file uploaded']);
    }


    //Question 6:

    // Retrieve the value of the 'remember_token' cookie from the current request in Laravel and 
    // store it in a variable called $rememberToken. If the cookie is not present, set $rememberToken 
    // to null.

    //     Answer 6:

    public function getCookie(Request $request)
    {
        $rememberToken = $request->cookie('remember_token');
        return $rememberToken;
    }


    //Question 7:

    //     Create a route in Laravel that handles a POST request to the '/submit' URL. 
    //     Inside the route closure, retrieve the 'email' input parameter from the request and 
    //     store it in a variable called $email. Return a JSON response with the following data:   
    // {
    //     "success": true,
    //     "message": "Form submitted successfully."
    // }


//     Answer 7:
    public function submit(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = $request->input('email');

    $data = [
        "success" => true,
        "message" => "Form submitted successfully."
    ];

    return response()->json($data);
}


}
