<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SqliteToSupabase extends Command
{
    protected $signature = 'app:sqlite-to-supabase';

    protected $description = 'Memindahkan data SQLite ke Supabase PostgreSQL';

    public function handle()
    {
        $tables = [
            'users',
            'layanans',
            'pelanggans',
            'transaksis',
        ];

        foreach ($tables as $tableName) {

            $this->info("Memindahkan tabel: {$tableName}");

            // Ambil data dari SQLite
            $rows = DB::connection('sqlite')
                ->table($tableName)
                ->get();

            if ($rows->isEmpty()) {
                $this->warn("Tabel {$tableName} kosong.");
                continue;
            }

            // Kosongkan tabel di Supabase
            DB::connection('pgsql')->table($tableName)->delete();

            foreach ($rows as $row) {
                DB::connection('pgsql')
                    ->table($tableName)
                    ->insert((array) $row);
            }

            $this->info("Selesai: {$tableName}");
        }

        $this->info("Semua data berhasil dipindahkan ke Supabase.");
    }
}