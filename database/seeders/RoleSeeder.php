<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Admin
        $roleSuper = Role::factory()->create([
            'name' => "Super Admin", 'slug' => "super-admin", 'description' => "Poderá fazer tudo no sistema", 'special' => "all-access"
        ]);

        $mail = sprintf("super-admin@%s", request()->getHost());
        $userSuper = User::factory()->create([
            'name' => "Super Admin", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $userSuper->roles()->sync($roleSuper->id->toString());

        //Admin geral
        $roleAdmin = Role::factory()->create([
            'name' => "Administrador Do Sistema", 'slug' => "administrador-sistema", 'description' => "Poderá fazer tudo menos as configurações de roles and permissions;", 'special' => null
        ]);

        $mail = sprintf("admin@%s", request()->getHost());
        $userAdmin = User::factory()->create([
            'name' => "Administrador", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $userAdmin->roles()->sync($roleAdmin->id->toString());

        // Fornecedor
        $roleFornecedor = Role::factory()->create([
            'name' => "Fornecedor", 'slug' => "fornecedor ", 'description' => "Apenas cadastrar os produtos e serviços no formulário", 'special' => 'no-defined'
        ]);

        $mail = sprintf("fornecedor@%s", request()->getHost());

        $Fornecedor = User::factory()->create([
            'name' => "Fornecedor", 'email' => $mail, 'status' => 'published', 'type' => 'app'
        ]);
        $Fornecedor->roles()->sync($roleFornecedor->id->toString());

        // Compras
        $roleCompras = Role::factory()->create([
            'name' => "Compras", 'slug' => "compras ", 'description' => "Recebe os cadastros, analisa, preenche com os campos que ele é reponsável e salva, após isso o produto", 'special' => 'no-defined'
        ]);
        $mail = sprintf("compras@%s", request()->getHost());

        $Compras = User::factory()->create([
            'name' => "Compras", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $Compras->roles()->sync($roleCompras->id->toString());

        // Marketing
        $roleMarketing = Role::factory()->create([
            'name' => "Marketing", 'slug' => "marketing  ", 'description' => "Recebe os cadastros, analisa, preenche com os campos que ele é reponsável e salva, após isso o produto vai pro setor de cadastro.", 'special' => 'no-defined'
        ]);
        $mail = sprintf("marketing@%s", request()->getHost());

        $Marketing = User::factory()->create([
            'name' => "Marketing", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $Marketing->roles()->sync($roleMarketing->id->toString());

        // Cadastros
        $roleCadastros = Role::factory()->create([
            'name' => "Cadastros", 'slug' => "cadastros  ", 'description' => "Recebe os cadastros, analisa, e baixa a ficha do produto em pdf, salva, coloca como concluido, após isso o produto vai para concluido.", 'special' => 'no-defined'
        ]);
        $mail = sprintf("cadastros@%s", request()->getHost());

        $Cadastros = User::factory()->create([
            'name' => "Cadastros", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $Cadastros->roles()->sync($roleCadastros->id->toString());

        // Estoque
        $roleEstoque = Role::factory()->create([
            'name' => "Estoque", 'slug' => "estoque  ", 'description' => "Recebe os cadastros, analisa, e baixa a ficha do produto em pdf, salva, coloca como concluido, após isso o produto vai pro estoque.", 'special' => 'no-defined'
        ]);
        $mail = sprintf("estoque@%s", request()->getHost());

        $Estoque = User::factory()->create([
            'name' => "Estoque", 'email' => $mail, 'status' => 'published', 'type' => 'admin'
        ]);
        $Estoque->roles()->sync($roleEstoque->id->toString());
    }
}
