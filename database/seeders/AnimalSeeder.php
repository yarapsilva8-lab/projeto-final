<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;


class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animais = [
            [
                'nome' => 'Rex',
                'especie' => 'Cachorro',
                'raca' => 'Pastor Alemão',
                'idade' => 3,
                'descricao' => 'Cão dócil e inteligente.',
            ],
            [
                'nome' => 'Mimi',
                'especie' => 'Gato',
                'raca' => 'Siamês',
                'idade' => 2,
                'descricao' => 'Gata tranquila e carinhosa.',
            ],
            [
                'nome' => 'Bolinha',
                'especie' => 'Cachorro',
                'raca' => 'Poodle',
                'idade' => 5,
                'descricao' => 'Adora brincar com crianças.',
            ],
            [
                'nome' => 'Pingo',
                'especie' => 'Pássaro',
                'raca' => 'Canário',
                'idade' => 1,
                'descricao' => 'Canta pela manhã.',
            ],
            [
                'nome' => 'Nemo',
                'especie' => 'Peixe',
                'raca' => 'Peixe-palhaço',
                'idade' => 1,
                'descricao' => 'Vive em aquário de água salgada.',
            ],
            [
                'nome' => 'Thor',
                'especie' => 'Cachorro',
                'raca' => 'Husky Siberiano',
                'idade' => 4,
                'descricao' => 'Ativo e cheio de energia.',
            ],
        ];

        foreach ($animais as $animal) {
            Animal::create($animal);
        }
    }
}
