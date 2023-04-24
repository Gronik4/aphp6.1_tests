<?php
interface TableWrapperInterface
{
    public function insert(string $values);
    public function update(int $id, string $values): array;
    public function delete(int $id): void;
    public function get(): array;
}
