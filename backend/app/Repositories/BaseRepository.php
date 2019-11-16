<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;

class BaseRepository {
    protected $modelName;
    public function all($relations = []) {
        $instance = $this->getNewInstance();
        return $instance->with($relations)->get();
    }

    public function find($id, $relations = []) {
        $instance = $this->getNewInstance();
        return $instance->with($relations)->find($id);
    }

    public function paginate($count) {
        $instance = $this->getNewInstance();
        return $instance->paginate($count);
    }

    public function store($data) {
        $instance = $this->getNewInstance();
        $instance->fill($data);
        $instance->save();
        return $instance;
    }

    public function update($id, $data) {
        $instance = $this->find($id);
        if ($instance === null) {
            return null;
        }
        $instance->fill($data);
        $instance->save();
        return $instance;
    }

    public function delete($id) {
        $instance = $this->find($id);
        if ($instance === null) {
            return null;
        }
        $instance->delete();
        return $instance;
    }

    public function findBy($field, $value, $relations = []) {
        $instance = $this->getNewInstance();
        return $instance->where($field, $value)->with($relations)->get();
    }

    public function getNewInstance() {
        $model = $this->modelName;
        return new $model;
    }

    public function onlyFields(Collection $collection, $fields = []) {
        return $collection->transform(function($item, $key) use ($fields) {
            return $item->only($fields);
        });
    }

    public function first($relations = []) {
        $instance = $this->getNewInstance();
        return $instance->with($relations)->first();
    }

}
