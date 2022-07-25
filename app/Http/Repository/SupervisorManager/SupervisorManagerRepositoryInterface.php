<?php

namespace App\Http\Repository\SupervisorManager;

interface SupervisorManagerRepositoryInterface
{
    public function getAll();
    public function getManager($id);
    public function getSupervisor($id);
    public function create();
    public function save($request);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}