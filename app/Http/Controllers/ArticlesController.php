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
		$tags = \App\Tag::lists('name', 'id');
                return view ('articles.create', compact('tags'));
        }

	public function store(ArticleRequest $request) {

//		$article = Auth::user()->articles()->create($request->all());
//		$article->tags()->attach($request->input('tag_list'));

		$this->createArticle($request);

		flash('You are now logged in');

		return redirect('articles')->with('flash_message');

        }

	public function edit(NewArticle $article) {
		$tags = \App\Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tags'));


        }

	public function update(NewArticle $article, ArticleRequest $request) {

		$article->update($request->all());
//		$article->tags()->sync($request->input('tag_list'));
		$this->syncTags($article, $request->input('tag_list'));

                return redirect('articles');


        }

	private function syncTags(Article $article, array $tags){

		$article->tags()->sync($tags);

	}

	private function createArticle(ArticleRequest $request){

		$this->createArticle($request);
		$this->syncTags($article, $request->input('tag_list'));
		return $article;

	}
}
