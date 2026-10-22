<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\ProdutoService;
use App\Models\Produto;
use Illuminate\Validation\ValidationException;

class ProdutoServiceTest extends TestCase
{
    use RefreshDatabase;

    private ProdutoService $produtoService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->produtoService = new ProdutoService();
    }

    /**
     * TESTE 1: Produto NÃO cria se o valor não segue a regra de negócio (< 10% margem)
     */
    public function test_produto_nao_cria_se_valor_nao_segue_regra_de_negocio()
    {
        $this->expectException(ValidationException::class);

        $dadosInvalidos = [
            'nome' => 'Produto Teste',
            'preco_custo' => 100.00,
            'preco' => 105.00
        ];

        $this->produtoService->create($dadosInvalidos);
    }

    /**
     * TESTE 2: Update do service com SUCESSO
     */
    public function test_update_do_service_com_sucesso()
    {
        $produto = Produto::create([
            'nome' => 'Produto Antigo',
            'preco_custo' => 100.00,
            'preco' => 120.00
        ]);

        $dadosAtualizados = [
            'nome' => 'Produto Novo',
            'preco' => 130.00
        ];

        $produtoAtualizado = $this->produtoService->update($produto, $dadosAtualizados);

        $this->assertEquals('Produto Novo', $produtoAtualizado->nome);
        $this->assertEquals(130.00, $produtoAtualizado->preco);
        $this->assertDatabaseHas('produtos', [
            'id' => $produto->id,
            'nome' => 'Produto Novo',
            'preco' => 130.00
        ]);
    }

    /**
     * TESTE 3: Update do service FALHA se valor for inválido
     */
    public function test_update_do_service_falha_com_valor_invalido()
    {
        $this->expectException(ValidationException::class);

        $produto = Produto::create([
            'nome' => 'Produto Teste',
            'preco_custo' => 100.00,
            'preco' => 120.00
        ]);

        $dadosInvalidos = [
            'preco' => 105.00
        ];

        $this->produtoService->update($produto, $dadosInvalidos);
    }
}