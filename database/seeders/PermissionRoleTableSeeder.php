<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::all();
        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        $role = Role::where('name', 'administrador')->firstOrFail();
        $permissions = Permission::whereRaw("   `key` = 'browse_admin' or
                                                table_name = 'settings' or
                                                table_name = 'users' or
                                                table_name = 'documentos' or
                                                `key` = 'browse_tipos' or
                                                `key` = 'read_tipos' or
                                                `key` = 'edit_tipos' or
                                                `key` = 'add_tipos'")->get();
        $role->permissions()->sync($permissions->pluck('id')->all());

        $role = Role::where('name', 'user')->firstOrFail();
        $permissions = Permission::whereRaw("   `key` = 'browse_admin' or
                                                `key` = 'browse_documentos' or
                                                `key` = 'read_documentos' or
                                                `key` = 'edit_documentos' or
                                                `key` = 'add_documentos' or
                                                `key` = 'browse_tipos' or
                                                `key` = 'read_tipos' or
                                                `key` = 'edit_tipos' or
                                                `key` = 'add_tipos'")->get();
        $role->permissions()->sync($permissions->pluck('id')->all());
    }
}
