<?php


namespace App\Http\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    abstract function getModelClass(): string;

    protected function startConditions()
    {
        return clone $this->model;
    }
}
