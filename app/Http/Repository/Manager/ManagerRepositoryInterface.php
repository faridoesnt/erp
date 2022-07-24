<?php

namespace App\Http\Repository\Manager;

interface ManagerRepositoryInterface
{
    public function getAll();
    public function getCreateEdit();
    public function getID();
    public function save($data);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}