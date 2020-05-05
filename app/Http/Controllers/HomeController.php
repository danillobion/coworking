<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\News;
use App\Pessoa;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('config/config_home');
    }
    public function projects()
    {
        $resultado = Project::orderBy("created_at", "desc")->get();
        return view('config/config_project' , ['allProject'=>$resultado]);
    }
    public function news()
    {
        $resultado = News::orderBy("created_at", "desc")->get();
        return view('config/config_news' , ['allNews'=>$resultado]);
    }
    public function pessoas()
    {
        $resultado = Pessoa::orderBy("created_at", "desc")->get();
        return view('config/config_pessoa', ['allPessoas'=>$resultado]);
    }
}
