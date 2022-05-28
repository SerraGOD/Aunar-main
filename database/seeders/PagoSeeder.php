<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pago;
use Carbon\Carbon;

class PagoSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Pago::create([
            'user_id' => '5',
            'liquidacion_id' => '1',
            'transfer_id' => 'WW5wQTh4ejVMWDQ5cGg2OFVXNHFjTzBnNDJYcWpaY1dlWkgzWFpiRFFNOD0=',
            'amount' => '100.00',
            'authorization' => 'OUNMelkvUDdscXBLOG9vQi9XNlNYQT09',
            'method' => 'pay',
            'operation_type' => 'in',
            'transaction_type' => 'charge',
            'pay_type' => 'ZlZlYmRXZnY3b2dDTnFrMVhDQzc4dz09',
            'pay_brand' => 'NVcyRStVbkVScExrOTdvRzk2ZjlxQT09',
            'pay_holder_name' => 'Vzh2NXZET2ZzMk5mTVkzdlVmaE01cFUwQ1YrT01nWnJSclNaZktLUTIrMD0=',
            'pay_allows_charges' => true,
            'pay_allows_payouts' => true,
            'pay_bank_name' => 'b3JmQytvWW5oa1ZiWWpIV2s1K2N6UT09',
            'status' => 'VVNGdDdQK2lyMWdlNkxodDVvL1ZCUT09',
            'currency' => 'U2pEdWRiVkVCSGF0MW5VUzQ4UGNpZz09',
            'creation_date' => Carbon::now(),
            'operation_date' => Carbon::now(),
            'description' => 'Cargo inicial a mi cuenta',
            'error_message' => 'null',
            'order_id' => 'MzA2djg2M1lYOXVuNnplK2xZNnlhQT09',
            'exchange_rate_from' => 'USD',
            'exchange_rate_date' => '2014-11-21',
            'exchange_rate_value' => '13.61',
            'exchange_rate_to' => 'CO',
        ]);
        
        Pago::create([
            'user_id' => '6',
            'liquidacion_id' => '2',
            'transfer_id' => 'dVN5OUhDZWdYUUZ4ck1qTm01dHRqY0lzSHphcm91VXpNNVE3N0N3b1hyZz0=',
            'amount' => '100.00',
            'authorization' => 'TmhoOXpvUUR1TklEbDlzOEozL0ZOUT09',
            'method' => 'pay',
            'operation_type' => 'in',
            'transaction_type' => 'charge',
            'pay_type' => 'MDhacmhTRlNGSVIrZlNzMXFGYTVUZz09',
            'pay_brand' => 'RUJFOFVJOFd5czhsMWFzK0JvWUNqdz09',
            'pay_holder_name' => 'c0F5RzcvbmJDVFRaVnVCdllNdXRrZkRMeDRiZTZEWVZQWi9HcCtsb2RaVT0=',
            'pay_allows_charges' => true,
            'pay_allows_payouts' => true,
            'pay_bank_name' => 'bkFGblc5T21wSmhYbExMNVdrcEY2QT09',
            'status' => 'VVlUS20vWHlhcVBFNG9ubkJibVlWUT09',
            'currency' => 'cjljYm9WLzl1dDZIb01YeVB3ZXFndz09',
            'creation_date' => Carbon::now(),
            'operation_date' => Carbon::now(),
            'description' => 'Cargo inicial a mi cuenta',
            'error_message' => 'null',
            'order_id' => 'WGhqc09QQWp5VDB2M2VqWVFDQzJNZz09',
            'exchange_rate_from' => 'USD',
            'exchange_rate_date' => '2014-11-21',
            'exchange_rate_value' => '13.61',
            'exchange_rate_to' => 'CO',
        ]);
    }

}
