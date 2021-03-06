<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VitaldataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'id' => '1',
            'user_id' => '1',
            'date' => '2019-04-30',
            'bodytemperature' => '36.5',
            'pulse' => '60',
            'systolicbp' => '120',
            'diastlicbp' => '60',
            'excretion' => '1',
            'stoolform' => '2',
            'freecomments' => '体調良好',
        ];
        DB::table('vitaldata')->insert($param);

        $param=[
            'id' => '2',
            'user_id' => '1',
            'date' => '2019-05-01',
            'bodytemperature' => '37.5',
            'pulse' => '100',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => '風邪気味',
        ];
        DB::table('vitaldata')->insert($param);

        $param=[
            'id' => '3',
            'user_id' => '1',
            'date' => '2019-05-03',
            'bodytemperature' => '36.8',
            'pulse' => '78',
            'systolicbp' => '100',
            'diastlicbp' => '80',
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => null,
        ];
        DB::table('vitaldata')->insert($param);

        $param=[
            'id' => '4',
            'user_id' => '1',
            'date' => '2019-05-05',
            'bodytemperature' => '36.2',
            'pulse' => '85',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => '1',
            'stoolform' => '1',
            'freecomments' => 'まあまあ',

        ];
        DB::table('vitaldata')->insert($param);
        $param=[
            'id' => '5',
            'user_id' => '1',
            'date' => '2019-05-07',
            'bodytemperature' => '36.7',
            'pulse' => '90',
            'systolicbp' => '150',
            'diastlicbp' => '90',
            'excretion' => '2',
            'stoolform' => '2',
            'freecomments' => '普通',

        ];
        DB::table('vitaldata')->insert($param);
        $param=[
            'id' => '6',
            'user_id' => '1',
            'date' => '2019-05-08',
            'bodytemperature' => '35.8',
            'pulse' => '58',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,

        ];
        DB::table('vitaldata')->insert($param);
        $param=[
            'id' => '7',
            'user_id' => '1',
            'date' => '2019-05-12',
            'bodytemperature' => '36.9',
            'pulse' => '98',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,

        ];
        DB::table('vitaldata')->insert($param);
        $param=[
            'id' => '8',
            'user_id' => '1',
            'date' => '2019-05-15',
            'bodytemperature' => null,
            'pulse' => '100',
            'systolicbp' => '150',
            'diastlicbp' => '70',
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,

        ];
        DB::table('vitaldata')->insert($param);

        $param=[
            'id' => '9',
            'user_id' => '1',
            'date' => '2019-05-20',
            'bodytemperature' => '39.0',
            'pulse' => '120',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => '感染性胃腸炎',
        ];
        DB::table('vitaldata')->insert($param);

        $param=[
            'id' => '10',
            'user_id' => '1',
            'date' => '2019-05-25',
            'bodytemperature' => '42.0',
            'pulse' => '130',
            'systolicbp' => '170',
            'diastlicbp' => '100',
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => '熱上昇傾向',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '11',
            'user_id' => '1',
            'date' => '2019-05-26',
            'bodytemperature' => '38.0',
            'pulse' => null,
            'systolicbp' => '130',
            'diastlicbp' => '90',
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,
        ];
        DB::table('vitaldata')->insert($param);

        
        $param=[
            'id' => '12',
            'user_id' => '1',
            'date' => '2019-05-28',
            'bodytemperature' => '35.6',
            'pulse' => null,
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => '1',
            'stoolform' => '1',
            'freecomments' => '低体温',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '13',
            'user_id' => '1',
            'date' => '2019-05-29',
            'bodytemperature' => '36.5',
            'pulse' => null,
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '14',
            'user_id' => '1',
            'date' => '2019-05-30',
            'bodytemperature' => '36.9',
            'pulse' => '80',
            'systolicbp' => '110',
            'diastlicbp' => '90',
            'excretion' => '1',
            'stoolform' => '3',
            'freecomments' => '普通',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '15',
            'user_id' => '1',
            'date' => '2019-06-01',
            'bodytemperature' => '37.4',
            'pulse' => '90',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => null,
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '16',
            'user_id' => '1',
            'date' => '2019-06-02',
            'bodytemperature' => '37.0',
            'pulse' => '85',
            'systolicbp' => '145',
            'diastlicbp' => '80',
            'excretion' => '2',
            'stoolform' => '2',
            'freecomments' => '良好',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '17',
            'user_id' => '1',
            'date' => '2019-06-03',
            'bodytemperature' => null,
            'pulse' => null,
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => null,
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '18',
            'user_id' => '1',
            'date' => '2019-06-04',
            'bodytemperature' => '36.1',
            'pulse' => '65',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => '良好',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '19',
            'user_id' => '1',
            'date' => '2019-06-05',
            'bodytemperature' => '36.8',
            'pulse' => '70',
            'systolicbp' => '170',
            'diastlicbp' => '100',
            'excretion' => '3',
            'stoolform' => '3',
            'freecomments' => '血圧高め',
        ];
        DB::table('vitaldata')->insert($param);
        
        $param=[
            'id' => '20',
            'user_id' => '1',
            'date' => '2019-06-07',
            'bodytemperature' => '38.0',
            'pulse' => '100',
            'systolicbp' => null,
            'diastlicbp' => null,
            'excretion' => null,
            'stoolform' => null,
            'freecomments' => '発熱',
        ];
        DB::table('vitaldata')->insert($param);
    }
}
