<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_indexed()
    {
        $products = Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);

        $response->assertJsonCount(3);
    }

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $product->id,
            'sku' => $product->sku,
            'name' => $product->name,
            'price' => (string) $product->price,
        ]);
    }

    public function test_product_can_be_stored()
    {
        $data = [
            'sku' => '123ABC',
            'name' => 'Test Product',
            'price' => 99.99,
        ];
        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', $data);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();

        $updatedData = [
            'sku' => '123XYZ',
            'name' => 'Updated Product',
            'price' => 199.99,
        ];

        $response = $this->putJson("/api/products/{$product->id}", $updatedData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', $updatedData);
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}