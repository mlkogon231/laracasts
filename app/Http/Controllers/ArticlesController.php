<?php namespace App\Http\Controllers;

use App\NewArticle;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illumniate\HttpResponse;
use Illuminate\Http\Request;
//use Request;

class ArticlesController extends Controller {

	public function index() {

//	return \Auth::user()->name;
// query scope on next line
		$articles = NewArticle::latest('published_at')->published()->get();
//		$articles = NewArticle::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
         //dd($articles);
		return view('articles.index', compact('articles'));
	}

	public function show($id) {
//dd('you are in show');
		$article = NewArticle::findOrFail($id);
		return view ('articles.show', compact('article'));
	}

        public function create() {
                return view ('articles.create');
        }

	public function store(ArticleRequest $request) {

	    // validation

		NewArticle::create($request->all());
		return   redirect('articles');

        }

	public function edit($id) {

		$article = NewArticle::findOrFail($id);
		return view('articles.edit', compact('article'));


        }

	public function update($id, ArticleRequest $request) {

                $article = NewArticle::findOrFail($id);
		$article->update($request->all());
                return redirect('articles');


        }


}
