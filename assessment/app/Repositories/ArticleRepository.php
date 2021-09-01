<?php

namespace App\Repositories;

use App\Interfaces\Crud;
use App\Models\Article;

class ArticleRepository implements Crud
{
    /**
     * List resources in the database
     *
     * @return mixed
     */
    public function list(): array
    {
        $users = Article::all()->toArray();
        return $users;
    }

    /**
     * Saves the resource in the database
     *
     * @param array $validatedData
     * @return object
     */
    public function create(array $validatedData): object
    {
        $user = Article::create($validatedData);
        return $user;
    }

    /**
     * Updates the resource in the database
     *
     * @param array $validatedData
     * @param object $article
     * @return object
     */
    public function update(object $article, array $validatedData): object
    {
        $article->update($validatedData);
        return $article;
    }

    /**
     * Deletes the resource in the database
     *
     * @param object $article
     * @return string
     */
    public function delete(object $article): bool
    {
        $article->delete();
        return true;
    }

}
