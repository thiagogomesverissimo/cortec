<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Categoria;

class CategoriaCrudTest extends TestCase
{
  /**
   * @test create
   */
  public function testCreateCategoria()
  {
      $categoria = factory(Categoria::class)->make();
      $response = $this->post('categorias', $categoria->toArray());
      $this->assertDatabaseHas('categorias', $categoria->toArray());
  }

  /**
   * @test read
   */
  public function testReadCategoria()
  {
    $categoria = factory(Categoria::class)->create();
    $response = $this->get('/categorias/' . $categoria->id);
    $response->assertStatus(200);
    $response->assertSeeText($categoria->nome);
  }

  /**
   * @test update
   */

  public function testUpdateCategoria()
  {
    $categoria = factory(Categoria::class)->create();

    // Edit page exists?
    $response = $this->get('categorias/' . $categoria->id . '/edit');
    $response->assertStatus(200);

    // edit
    $categoria->nome = $categoria->nome . ' Edited';
    $response = $this->patch('/categorias/' . $categoria->id, $categoria->toArray());
    $this->assertDatabaseHas('categorias', $categoria->toArray());
  }

  /**
   * @test delete
   */

  public function testDeleteCategoria()
  {
      $categoria = factory(Categoria::class)->create();
      $response = $this->delete('/categorias/' . $categoria->id);
      $this->assertNull(Categoria::find($categoria->id));
  }

  /**
   * @test index
   */
  public function testIndexCategoria()
  {
      $categoria = factory(Categoria::class)->create();
      $response = $this->get('corporas?page=' . Categoria::paginate(10)->lastPage());
      $response->assertStatus(200);
      $response->assertSeeText($categoria->nome);
  }

}
