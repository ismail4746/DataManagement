<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function find(int $id): ?Product
    {
        return Product::find($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(int $id, array $data): Product
    {
        $product = $this->find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        throw new \Exception("Product not found");
    }

    public function delete(int $id): bool
    {
        $product = $this->find($id);
        if ($product) {
            return $product->delete();
        }
        throw new \Exception("Product not found");
    }
}
