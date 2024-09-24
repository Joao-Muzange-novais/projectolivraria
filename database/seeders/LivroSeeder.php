<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelLivro;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Modellivro $livro)
    {
        $livro->create([
            'titulo'=>'Portal do municipe',
            'pagina'=>'100',
            'preco'=>'10.22',
             'user_id'=>'1',
        ]);
        
    }
}
