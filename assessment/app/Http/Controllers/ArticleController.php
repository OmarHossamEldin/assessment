<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Lang;
use App\Helpers\JsonResponse;
use App\Models\Article;

class ArticleController extends Controller
{
     /**
     * Display a listing of the resource.
     * @param ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->list();
        return JsonResponse::response(data: ['articles' => $articles], statusCode: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return JsonResponse
     */
    public function show(Article $article)
    {
        return JsonResponse::response(data: ['article' => $article], statusCode: 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest $request
     * @param  Article $article
     * @param  ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function update(ArticleRequest  $request, Article $article, ArticleRepository $articleRepository)
    {
        $article = $articleRepository->update($article, $request->validated());

        return JsonResponse::response(message: Lang::get('db.success'), data: ['article' => $article], statusCode: 206);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @param  ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function destroy(Article $article, ArticleRepository $articleRepository)
    {
        $result = $articleRepository->delete($article);
        return $result ? JsonResponse::response(message: Lang::get('db.success'), data: [], statusCode: 200) : 'error';
    }
}
