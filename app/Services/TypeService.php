<?php

namespace App\Services;
use App\Models\Type;

class TypeService
{

    /** @var Type $type */
    protected $type;

    /**
     * @param Type $type
     * */
    public function __construct(Type $type) {
        $this->type = $type;
    }

    /** Return All Teams */
    public function getAll() {
        return $this->type->all();
    }

    /**  */
    public function club() {

    }

    /**  */
    public function create() {

    }


    /**  */
    public function edit() {

    }

    /**  */
    public function deleteById($id) {
        return $this->type->find($id)->delete();
    }

}











