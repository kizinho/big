<?php

use Illuminate\Database\Seeder;
use App\Coin;

class CoinTableDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $coin = new Coin();
        $coin->name = 'Bitcoin Address';
        $coin->slug = str_slug('Bitcoin Address','_');
        $coin->address = 'dsdjhdjhdhjhhrhejhdjhje';
        $coin->q_code = 'coming';
        $coin->photo = 'images/bitcoin.gif';
        $coin->save();
//        //coin 2
//        $coin2 = new Coin();
//        $coin2->name = 'Litecoin Address';
//        $coin2->slug = str_slug('Litecoin Address','_');
//        $coin2->address = 'Ltdsdjhdjhdhjhhrhejhdjhje';
//        $coin2->q_code = 'coming';
//        $coin2->photo = 'images/litecoin.gif';
//        $coin2->save();
//        //coin 3
//        $coin3 = new Coin();
//        $coin3->name = 'Ethereum Address';
//        $coin3->slug = str_slug('Ethereum Address','_');
//        $coin3->address = 'Ethudsdjhdjhdhjhhrhejhdjhje';
//        $coin3->q_code = 'coming';
//        $coin3->photo = 'images/ethereum.gif';
//        $coin3->save();
//        //coin 4
//        $coin4 = new Coin();
//        $coin4->name = 'Bitcoin Cash Address';
//        $coin4->slug = str_slug('Bitcoin Cash Address','_');
//        $coin4->address = 'Btccdsdjhdjhdhjhhrhejhdjhje';
//        $coin4->q_code = 'coming';
//        $coin4->photo = 'images/bitcoin-cash.png';
//        $coin4->save();
//        //coin 5
//        $coin5 = new Coin();
//        $coin5->name = 'Dash Address';
//        $coin5->slug = str_slug('Dash Address','_');
//        $coin5->address = 'ashhhdsdjhdjhdhjhhrhejhdjhje';
//        $coin5->q_code = 'coming';
//        $coin5->photo = 'images/dash.png';
//        $coin5->save();
    }

}
