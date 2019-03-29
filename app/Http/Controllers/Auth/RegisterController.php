<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\PessoaJuridica;
use App\Model\Endereco;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate = Validator::make($data, [
            'cpf_or_cnpj' => 'cpf_cnpj|unique:users',
            'name' => ['required', 'string', 'max:50'],
            'email' => 'max:45',
            'telefone'=>'required',
            'password' => 'min:6|required',
            'password-confirm' => 'min:6|same:password',
            'tipo'=> 'required',
            'email' => 'max:45',
        ]);
         if($validate->fails())
        {
            dd($validate->errors());
        }
        return $validate;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['tipo'] == 'Fisica') {
            $tipo = 0;
        }else{
            $tipo = 1;
        }
        $user=User::firstOrCreate([
            'name' => $data['name'],
            'email' => $data['email'],
            'telefone'=> $data['telefone'],
            'tipo' => $tipo,
            'password' => Hash::make($data['password'])
        ]);
        $data['user']=$user->id;
        $endereco=Endereco::insert($data);
        $data['endereco']=$endereco->id;
        if ($tipo) {
            PessoaJuridica::inserir($data);
        }else{
            PessoaFisica::inserir($data);
        }
        return;
    }
}
