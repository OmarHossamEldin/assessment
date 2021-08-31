<?php

namespace App\InterFaces;

interface Crud
{
    public function list(): array;

    public function create(array $data): object;

    public function update(object $model, array $data): object;

    public function delete(object $model): bool;
}
