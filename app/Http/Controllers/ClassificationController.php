<?php

namespace App\Http\Controllers;

use App\Models\Classifications;
use Illuminate\Http\Request;
use Auth;
/**
* ----------------------------------------------------------------------------
* Controler para a tabela de classificação
* ----------------------------------------------------------------------------
*/
class ClassificationController extends Controller
{
    /**
    * ------------------------------------------------------------------------
    * Somente usuários autenticados poderão acessar os métodos do
    * controller
    * ------------------------------------------------------------------------
    */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * ------------------------------------------------------------------------
    * Utilizado para exibir uma lista de classificações
    * ------------------------------------------------------------------------
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $classifications = Classifications::orderBy('id', 'desc')
                           ->paginate(6);
        return view('classifications.index',[
            'classifications'   => $classifications
        ]);                   
    }
    /**
    * ------------------------------------------------------------------------
    * Utilizado para exibir a view com o formulário para a inclusão de
    * um novo registro
    * ------------------------------------------------------------------------
    *
    * @return \Illuminate\Http\Response
    */
    public function create(){
        // Chama a view com o formulário para inserir um novo registro
        return view('classifications.create');
    }
    /**
    * ------------------------------------------------------------------------
    * Utilizado para inserir os dados do formulário na tabela
    * ------------------------------------------------------------------------
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        // Cria as regras de validação dos dados do formulário
        $rules = ['descricao' => 'required|min:5|max:30'];

        // Cria o array com as mensagens de erros
        $messages = ['descricao.unique' => 'A classificação deve ser única em toda a tabela'];

        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules, $messages);

        // Cria um novo registro
        $classification = new Classifications;
        $classification->descricao = $request->descricao;
        // Salva os dados na tabela
        $classification->save();

        // Retorna para view index com uma flash message
        return redirect()
               ->route('classifications.index')
               ->with('status', 'Registro criado com sucesso!');
    }

    /**
    * ------------------------------------------------------------------------
    * Exibe os dados de um determinado registro
    * ------------------------------------------------------------------------
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        // Localiza e retorna os dados de um registro pelo ID
        $classification = Classifications::findOrFail($id);

        // Chama a view para exibir os dados na tela
        return view('classifications.show',[
            'classification' => $classification
        ]);
    }

    /**
    * ------------------------------------------------------------------------
    * Exibe um formulário com os dados de um determinado registro permitindo
    * que o usuário faça alterações
    * ------------------------------------------------------------------------
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id){
    // Localiza o registro pelo seu ID
        $classification = Classifications::findOrFail($id);

    // Chama a view com o formulário para edição do registro
        return view('classification.edit',[
            'classification' => $classification
        ]);
    }

    /**
    * ------------------------------------------------------------------------
    * Utilizado para atualizados os dados do formulário na tabela
    * ------------------------------------------------------------------------
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id){
    // Cria as regras de validação dos dados do formulário
        $rules = [
            'descricao' => 'required|string|unique:classifications|min:5|max:30'
        ];

    // Cria o array com as mensagens de erros
        $messages = [
            'descricao.unique' => 'A classificação deve ser única em toda a tabela'
        ];

    // Primeiro, vamos validar os dados do formulário
        $request->validate($rules, $messages);

    // Cria um novo registro
        $classification = Classifications::findOrFail($id);
        $classification->descricao = $request->descricao;

    // Salva os dados na tabela
        $classification->save();

    // Retorna para view index com uma flash message
        return redirect()
               ->route('classifications.index')
               ->with('status', 'Registro atualizado com sucesso!');
    }
    /**
    * ------------------------------------------------------------------------
    * Utilizado para excluir um registro da tabela
    * ------------------------------------------------------------------------
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
    // Retorna o registro pelo ID fornecido
        $classification = Classifications::findOrFail($id);

    // Exclui o registro da tabela
        $classification->delete();

    // Retorna para view index com uma flash message
        return redirect()
               ->route('classifications.index')
               ->with('status', 'Registro excluído com sucesso!');
    }
}
