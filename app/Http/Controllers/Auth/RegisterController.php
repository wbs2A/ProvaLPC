<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Model\PessoaJuridica;
use App\Model\PessoaFisica;
use App\Model\Endereco;
use Validator;
use App\User;

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
    protected $redirectTo = '/';

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
        $validate;
        $data['telefone']=preg_replace("/[^0-9]/", "", $data['telefone']);
        $data['cep']=preg_replace("/[^0-9]/", "", $data['cep']);
        if ($data['tipo'] == 'Fisica') {
            $data['cpf']=preg_replace("/[^0-9]/", "", $data['cpf']);
            $data['rg']=preg_replace("/[^0-9]/", "", $data['rg']);
            $validate = Validator::make($data, [
                'name' => ['required', 'string', 'max:50'],
                'email' => 'max:45',
                'telefone'=>'required',
                'tipo'=> 'required',
                'idpessoaFisica' => 'cpf|unique:pessoafisica',
                'password' => 'min:6|required',
                'password-confirm' => 'min:6|same:password',
                'email' => 'max:45',
                'nascimento'=>'required',
                'sexo'=>'required',
                'nCNH'=>'required|cnh',
                'nRegistro'=>'required',
                'dataValidade'=>'required',
                'estadoCNH'=>'required',
                'cep'=>'required',
                'numero'=>'required',
                'cidade'=>'required',
                'bairro'=>'required',
                'rua'=>'required',
                'estado'=>'required'
            ]);
        }else{
            $data['cnpj']=preg_replace("/[^0-9]/", "", $data['cnpj']);
            $validate = Validator::make($data, [
                'name' => ['required', 'string', 'max:50'],
                'email' => 'max:45',
                'telefone'=>'required',
                'tipo'=> 'required',
                'password' => 'min:6|required',
                'password-confirm' => 'min:6|same:password',
                'email' => 'max:45',
                'idPJ'=>'cnpj|unique:pessoajuridica',
                'razaoSocial'=>'required',
                'cep'=>'required',
                'numero'=>'required',
                'cidade'=>'required',
                'bairro'=>'required',
                'rua'=>'required',
                'estado'=>'required'
            ]);
        }
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

        $data['telefone']=preg_replace("/[^0-9]/", "", $data['telefone']);
        $data['cep']=preg_replace("/[^0-9]/", "", $data['cep']);
        if ($data['tipo'] == 'Fisica') {
            $data['cpf']=preg_replace("/[^0-9]/", "", $data['cpf']);
            $data['rg']=preg_replace("/[^0-9]/", "", $data['rg']);
            $tipo = 0;
        }else{
            $data['cnpj']=preg_replace("/[^0-9]/", "", $data['cnpj']);
            $tipo = 1;
        }

        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telefone'=> $data['telefone'],
            'tipo' => $tipo,
            'password' => Hash::make($data['password'])
        ]);
        $data['user']=$user->iduser;
        $endereco=Endereco::insert($data);
        $data['endereco']=$endereco->id;
        if ($tipo) {
            PessoaJuridica::inserir($data);
        }else{
            PessoaFisica::inserir($data);
        }
        // session()->put('user', Auth::user());
        
        return $user;
    }
}
