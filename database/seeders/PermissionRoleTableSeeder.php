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
        $permissions = Permission::whereRaw("   `key` = 'browse_adSmin' or
                                                table_name = 'settings' or
                                                `key` = 'browse_users' or
                                                `key` = 'read_users' or
                                                `key` = 'edit_users' or
                                                `key` = 'add_users' or
                                                table_name = 'documents' or
                                                `key` = 'browse_document_types' or
                                                `key` = 'read_document_types' or
                                                `key` = 'edit_document_types' or
                                                `key` = 'add_document_types'")->get();
        $role->permissions()->sync($permissions->pluck('id')->all());

        $role = Role::where('name', 'user')->firstOrFail();
        $permissions = Permission::whereRaw("   `key` = 'browse_admin' or
                                                `key` = 'browse_documents' or
                                                `key` = 'read_documents' or
                                                `key` = 'edit_documents' or
                                                `key` = 'add_documents' or
                                                `key` = 'browse_document_types' or
                                                `key` = 'read_document_types' or
                                                `key` = 'edit_document_types' or
                                                `key` = 'add_document_types'")->get();
        $role->permissions()->sync($permissions->pluck('id')->all());
    }
}
