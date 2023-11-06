<?php

namespace App\Http\Controllers;

use App\Repositories\CampeonatoRepository;
use App\Services\CampeonatoService;
use App\Util\TratarExcecoes;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public static function buscarCampeonatosPainel()
    {
        try {
            $campeonatos = CampeonatoService::buscarCampeonatos();

            return view('painel.campeonatos')->with('campeonatos', $campeonatos);
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return redirect()->route('painel.campeonatos')->with('erro', $erro);
        }
    }

    public static function buscarCampeonatosSite()
    {
        try {
            $campeonatosDestaque = CampeonatoRepository::buscarCampeonatosDestacados();
            $campeonatos = CampeonatoRepository::buscarCampeonatosRecentes();

            return view('index')->with(['campeonatos_destaque' => $campeonatosDestaque, 'campeonatos' => $campeonatos]);
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return redirect()->route('painel.campeonatos')->with('erro', $erro);
        }
    }

    public static function buscarTodosCampeonatosAtivos()
    {
        try {
            $campeonatos = CampeonatoRepository::buscarTodosCampeonatos();

            return view('site.torneios')->with('campeonatos', $campeonatos);
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return redirect()->route('site.torneios')->with('erro', $erro);
        }
    }

    public static function destacarOuTirarDestaque(Request $request)
    {
        try {
            $dados = $request->all();
            $destacado = $dados['destacado'];
            $id = $dados['id'];

            CampeonatoService::modificarDestaque($destacado, $id);
            
            $campeonatos = CampeonatoService::buscarCampeonatos();

            return view('painel.campeonatos')->with('campeonatos', $campeonatos);
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return redirect()->route('campeonatos_painel')->with('erro', $erro);
        }
    }

    public static function cadastrar(Request $request)
    {
        try {
            $dados = $request->except(['_token', 'cidade', 'fileInput']);

            CampeonatoService::cadastrarCampeonato($dados);

            return redirect()->route('cadastrar_campeonato')->with('mensagemSucesso', 'Campeonato inserido com sucesso!');
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return redirect()->route('cadastrar_campeonato')->with('erro', $erro);
        }
    }

    public static function salvarImagem(Request $request)
    {
        try {
            $dados = $request->image;

            $nomeImagem = CampeonatoService::salvarImagem($dados);

            return response()->json(['nome_imagem' => $nomeImagem]);
        } catch (\Exception $e) {
            $erro = TratarExcecoes::verificaCodigo($e);

            return response()->json(['erro' => $erro]);
        }
    }
}
