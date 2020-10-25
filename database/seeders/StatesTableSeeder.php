<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            ['id' => 1,     'country_id' => 1  ,     'name' => 'Acre',                   'initials' => 'AC'],
            ['id' => 2,     'country_id' => 1  ,     'name' => 'Alagoas',                'initials' => 'AL'],
            ['id' => 3,     'country_id' => 1  ,     'name' => 'Amapá',                  'initials' => 'AP'],
            ['id' => 4,     'country_id' => 1  ,     'name' => 'Amazonas',               'initials' => 'AM'],
            ['id' => 5,     'country_id' => 1  ,     'name' => 'Bahia',                  'initials' => 'BA'],
            ['id' => 6,     'country_id' => 1  ,     'name' => 'Ceará',                  'initials' => 'CE'],
            ['id' => 7,     'country_id' => 1  ,     'name' => 'Distrito Federal',       'initials' => 'DF'],
            ['id' => 8,     'country_id' => 1  ,     'name' => 'Espírito Santo',         'initials' => 'ES'],
            ['id' => 9,     'country_id' => 1  ,     'name' => 'Goiás',                  'initials' => 'GO'],
            ['id' => 10,    'country_id' => 1  ,     'name' => 'Maranhão',               'initials' => 'MA'],
            ['id' => 11,    'country_id' => 1  ,     'name' => 'Mato Grosso',            'initials' => 'MT'],
            ['id' => 12,    'country_id' => 1  ,     'name' => 'Mato Grosso do Sul',     'initials' => 'MS'],
            ['id' => 13,    'country_id' => 1  ,     'name' => 'Minas Gerais',           'initials' => 'MG'],
            ['id' => 14,    'country_id' => 1  ,     'name' => 'Pará',                   'initials' => 'PA'],
            ['id' => 15,    'country_id' => 1  ,     'name' => 'Paraíba',                'initials' => 'PB'],
            ['id' => 16,    'country_id' => 1  ,     'name' => 'Paraná',                 'initials' => 'PR'],
            ['id' => 17,    'country_id' => 1  ,     'name' => 'Pernambuco',             'initials' => 'PE'],
            ['id' => 18,    'country_id' => 1  ,     'name' => 'Piauí',                  'initials' => 'PI'],
            ['id' => 19,    'country_id' => 1  ,     'name' => 'Rio de Janeiro',         'initials' => 'RJ'],
            ['id' => 20,    'country_id' => 1  ,     'name' => 'Rio Grande do Norte',    'initials' => 'RN'],
            ['id' => 21,    'country_id' => 1  ,     'name' => 'Rio Grande do Sul',      'initials' => 'RS'],
            ['id' => 22,    'country_id' => 1  ,     'name' => 'Rondônia',               'initials' => 'RO'],
            ['id' => 23,    'country_id' => 1  ,     'name' => 'Roraima',                'initials' => 'RR'],
            ['id' => 24,    'country_id' => 1  ,     'name' => 'Santa Catarina',         'initials' => 'SC'],
            ['id' => 25,    'country_id' => 1  ,     'name' => 'São Paulo',              'initials' => 'SP'],
            ['id' => 26,    'country_id' => 1  ,     'name' => 'Sergipe',                'initials' => 'SE'],
            ['id' => 27,    'country_id' => 1  ,     'name' => 'Tocantins',              'initials' => 'TO'],
        ]);
    }
}
