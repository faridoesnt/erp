<?php

namespace App\Http\Repository\SupervisorManager;

interface SupervisorManagerRepositoryInterface
{
    public function getManager($id);
    public function getSupervisor($id);
    public function create();
    public function save($request);
    public function delete($id);
}