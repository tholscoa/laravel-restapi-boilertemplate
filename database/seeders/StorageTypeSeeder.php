<?php

namespace Database\Seeders;

use App\Models\StorageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $storage_types = [
            ['name'=>'Google', 'is_default'=>'0', 'type_name'=>'gcs','is_active'=>'0'],
            ['name'=>'S3', 'is_default'=>'0', 'type_name'=>'s3','is_active'=>'0'],
            ['name'=>'Local', 'is_default'=>'1', 'type_name'=>'local', 'is_active'=>'1']
        ];
        foreach($storage_types as $storage_type){
            StorageType::updateOrCreate($storage_type);
        }
    }
}
