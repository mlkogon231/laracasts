<?php namespace App\Http\Controllers;

use App\NewArticle;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illumniate\HttpResponse;
use Illuminate\Http\Request;
use Auth;
//use Request;

class ArticlesController extends Controller {

	public function __construct(){
		$this->middleware('auth', ['except' => 'index', 'show']);
	}

	public function index() {

//	return \Auth::user()->name;
//return \Auth::user();
// query scope on next line
		$articles = NewArticle::latest('published_at')->published()->get();
//		$articles = NewArticle::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
         //dd($articles);
		return view('articles.index', compact('articles'));
	}

// show a single article
// param Article $article
// return Response

	public function show(NewArticle $article) {

		return view ('articles.show', compact('article'));

	}

        public function create() {
                return view ('articles.create');
        }

	public function store(ArticleRequest $request) {

		Auth::user()->articles()->create($request->all());
		flash('You are now logged in');
		//flash()->overlay('Your article has been created', 'Yay');
		return redirect('articles')->with('flash_message');



//  		$article = new NewArticle($request->all());

//		Auth::user()->articles()->save($article);

//		session()->flash('flash_message', 'Your article has been created');
//		session()->flash('flash_message_important', true);

//	\Session::flash('flash_message', 'Your article has been created');

//		Auth::user()->articles()->save(new NewArticle($request->all()));

//		return redirect('articles')->with([
//			'flash_message' => 'Your article has been created',
//			'flash_message_important' => true
//		]);

        }

	public function edit(NewArticle $article) {

		return view('articles.edit', compact('article'));


        }

	public function update(NewArticle $article, ArticleRequest $request) {

		$article->update($request->all());
                return redirect('articles');


        }


}
