<?php 

namespace App\Http\Repository\Supervisor;

interface SupervisorRepositoryInterface
{
    public function getAll();
    public function getID();
    public function save($data);
    public function edit($id);
    public function update($request, $id);
    public function delete($id);
}