<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    
        return view(view: 'home');
    }
    public function listar()
    {
        $data = Cliente::where("user_id", \Auth::user()->id);

        return Datatables::of($data)
        ->addColumn('id', function($data)
        {
            return  $data->id;
        })
        ->addColumn('nome', function($data)
        {
            return  $data->nome;
        })
        ->addColumn('cpf', function($data)
        {
            return  $data->cpf;
        })
        ->addColumn('nascimento', function($data)
        {
            return date('d/m/Y', strtotime($data->nascimento));
        })
    
        ->addColumn('estado', function($data)
        {
            return $data->estado;
        })
        ->addColumn('cidade', function($data)
        {
            return $data->cidade;
        })
        ->addColumn('sexo', function($data)
        {
            return $data->sexo;
        })
        ->addColumn('editar', function($data)
        {
            return $data->id;
        })
        ->addColumn('excluir', function($data)
        {
            return $data->id;
        })
        ->rawColumns(['editar','excluir'])
        ->make(true);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|min:5',
            'nome' => 'required|min:5',
            'nascimento' => 'date', // Use 'nullable' se o campo pode ser opcional
            'genero_masculino' => 'required',   
            'genero_feminino' => 'required',     
            'endereco' => 'required|min:5',  
            'estado' => 'required', 
            'cidade' => 'required',  
        ]);
        
      
        if ($validator->fails()) 
        {

            return response()->json(["success"=>false,"mensagem"=>'Favor preecher todos os campos']);

        }

        $query= new Cliente;
        $query->cpf=$request->cpf;
        $query->user_id = \Auth::user()->id;
        $query->nome=$request->nome;
        $query->nascimento= date('Y-m-d', strtotime($request->nascimento));
        $query->endereco=$request->endereco;
        $query->sexo = !is_null($request->genero_masculino) ? $request->genero_masculino : $request->genero_feminino;
        $query->estado=$request->estado;
        $query->cidade=$request->cidade;
        $query->save();

        return response()->json(["success"=>true,"mensagem"=>'Dados foram salvo com sucesso']);
    }
    public function getCidadesPorEstado(Request $request)
{
    $cidades = Cidade::where('uf', $request->estadoId)->get();
    return response()->json($cidades);
}
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required', 
        ]);
        
      
        if ($validator->fails()) {
            return response()->json(["success"=>false,"mensagem"=>'Favor preecher todos os campos']);
        }
        
         Cliente::where('id',$request->id)->where('user_id',\Auth::user()->id)->delete();
      
        return response()->json(["success"=>true,"mensagem"=>'Registro deletado com sucesso']);
    }
    public function update(Request $request)
    {
       
        $validator = \Validator::make($request->all(), [
            'cpf' => 'required|min:5',
            'nascimento' => 'date',
            'sexo' => 'required',
            'endereco' => 'required|min:5',   
            'estado' => 'required', 
            'cidade'  => 'required',    
            'id' =>'required|min:1',     
            // Other validation rules here
           
        ]);
        if ($validator->fails()) {
            return response()->json(["success"=>false,"mensagem"=>'Favor preecher todos os campos']);
        }
    
        $query=Cliente::where('id',$request->id)
        ->where('user_id',\Auth::user()->id)->first();
        $query->cpf=$request->cpf;
        $query->nome=$request->nome;
        $query->nascimento= date('Y-m-d', strtotime($request->nascimento));
        $query->sexo=$request->sexo;
        $query->endereco=$request->endereco;
        $query->estado=$request->estado;
        $query->cidade=$request->cidade;
        $query->save();

        return response()->json(["success"=>true,"mensagem"=>'Registro atualizado com sucesso']);
    }
    
}
