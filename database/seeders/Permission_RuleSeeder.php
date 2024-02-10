<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRule;
use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Permission_RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rule=Rule::where('name','مدير')->first();
        $permissions=Permission::get();
        foreach ($permissions as $permission) {
            PermissionRule::create([
                'rule_id'=>$rule->id,
                'permission_id'=>$permission->id
            ]);
        }
    }
}
