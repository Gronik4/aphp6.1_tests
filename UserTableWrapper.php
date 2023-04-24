<?php
require_once 'TableWrapperInterface.php';
require_once 'Users.php';
#[AllowDynamicProperties] class UserTableWrapper implements TableWrapperInterface
{
    public function __construct() {
        $datas = Users::$users;
        $this->data = $datas;
    }
    public function insert(string $values): void {
        $this->data[] = $values;
    }
    public function update(int $id, string $values): array
    {
        $this->data[$id] = $values;
        return $this->data;
    }
    public function delete(int $id): void
    {
        unset($this->data[$id]);
    }
    public function get(): array
    {
        return $this->data;
    }
}