<?php

namespace App\Contracts;

interface MedicationInterface
{
    public function add(array $data);
    public function get(string $id);
    public function getAll();
    public function update(array $data, string $id);
    public function delete(string $id);
}
