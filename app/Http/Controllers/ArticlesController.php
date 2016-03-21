<?php namespace App\Http\Controllers;

use App\NewArticle;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;
//use Illuminate\Http\Request;
//use Request;

class ArticlesController extends Controller {

	public function index() {
// query scope on next line
		$articles = NewArticle::latest('published_at')->published()->get();
//		$articles = NewArticle::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
         //dd($articles);
		return view('articles.index', compact('articles'));
	}

	public function show($id) {
		$article = NewArticle::findOrFail($id);
		dd($article->published_at);
		return view ('articles.show', compact('article'));
	}

        public function create() {
                return view ('articles.create');
        }

	public function store(CreateArticleRequest $request) {

	    // validation

		NewArticle::create($request->all());
		return   redirect('articles');

        }


}
