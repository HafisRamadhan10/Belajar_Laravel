<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {

        $this->request = $request;

    }

    public function all()
    {

        $users = User::all();

        return response()->json($users);

    }

    public function find($id)
    {

        $user = User::where('id', $id)->first();

        return response()->json($user);

    }

    public function delete($id)
    {

        User::where('id', $id)->delete();

        return "true";

    }

    public function store()
    {

        $data = $this->request->all();

        User::create($data);

        return "true";

    }

    public function registration()
    {

        $rules = [

            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required'

        ];

        $input = $this->request->all();

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            $response = [

                'success' => false,

                'errors' => $validator->errors()

            ];

            return response()->json($response);

        }



        //$result=User::insert($input);

        if (isset($result)) {

            $response = [

                'success' => true,

                'data' => $result,

                'message' => 'Data successfully saved'

            ];

        } else {

            $response = [

                'success' => false,

                'errors' => 'Data save failed'

            ];

        }

        return response()->json($response);

    }

    public function login()
    {

        $credentials = $this->request->only('email', 'password');

        $rules = [

            'email' => 'required|email',
            'password' => 'required|min:6',

        ];

        $validator = Validator::make($credentials, $rules);

        if ($validator->fails()) {

            $response = [

                'success' => false,

                'errors' => 'Invalid email or password'

            ];

            return response()->json($response);

        }

        $user = User::where('email', $credentials['email'])->first();

        if (isset($user->id)) {

            $hashedPassword = $user->password;

            if (Hash::check($credentials['password'], $hashedPassword)) {

                $response = [

                    'success' => true,

                    'message' => 'Welcome to our site'

                ];

            }else{

                $response = [

                    'success' => false,

                    'errors' => 'Invalid email or password'

                ];

            }

        } else {

            $response = [

                'success' => false,

                'errors' => 'Invalid email or password'

            ];

        }

        return response()->json($response);

    }

}
