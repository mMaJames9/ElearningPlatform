<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions (user)
        Permission::create(['name' => 'user_management_access']);
        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_edit']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_delete']);
        Permission::create(['name' => 'user_access']);

        // create permissions (exam)
        Permission::create(['name' => 'exam_create']);
        Permission::create(['name' => 'exam_edit']);
        Permission::create(['name' => 'exam_show']);
        Permission::create(['name' => 'exam_delete']);
        Permission::create(['name' => 'exam_access']);

        // create permissions (classroom)
        Permission::create(['name' => 'classroom_create']);
        Permission::create(['name' => 'classroom_edit']);
        Permission::create(['name' => 'classroom_show']);
        Permission::create(['name' => 'classroom_delete']);
        Permission::create(['name' => 'classroom_access']);

        // create permissions (subject)
        Permission::create(['name' => 'subject_create']);
        Permission::create(['name' => 'subject_edit']);
        Permission::create(['name' => 'subject_show']);
        Permission::create(['name' => 'subject_delete']);
        Permission::create(['name' => 'subject_access']);

        // create permissions (document)
        Permission::create(['name' => 'document_create']);
        Permission::create(['name' => 'document_edit']);
        Permission::create(['name' => 'document_show']);
        Permission::create(['name' => 'document_delete']);
        Permission::create(['name' => 'document_download']);
        Permission::create(['name' => 'document_access']);

        // create permissions (role)
        Permission::create(['name' => 'role_show']);
        Permission::create(['name' => 'role_access']);

        // create permissions (permission)
        Permission::create(['name' => 'permission_show']);
        Permission::create(['name' => 'permission_access']);

        // create permissions (subscription)
        Permission::create(['name' => 'subscription_show']);
        Permission::create(['name' => 'subscription_access']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Admin']);

        // create permissions (exam)
        $role1->givePermissionTo('exam_create');
        $role1->givePermissionTo('exam_edit');
        $role1->givePermissionTo('exam_show');
        $role1->givePermissionTo('exam_delete');
        $role1->givePermissionTo('exam_access');

        // create permissions (classroom)
        $role1->givePermissionTo('classroom_create');
        $role1->givePermissionTo('classroom_edit');
        $role1->givePermissionTo('classroom_show');
        $role1->givePermissionTo('classroom_delete');
        $role1->givePermissionTo('classroom_access');

        // create permissions (subject)
        $role1->givePermissionTo('subject_create');
        $role1->givePermissionTo('subject_edit');
        $role1->givePermissionTo('subject_show');
        $role1->givePermissionTo('subject_delete');
        $role1->givePermissionTo('subject_access');

        // create permissions (document)
        $role1->givePermissionTo('document_create');
        $role1->givePermissionTo('document_edit');
        $role1->givePermissionTo('document_show');
        $role1->givePermissionTo('document_delete');
        $role1->givePermissionTo('document_access');

        // create permissions (subscription)
        $role1->givePermissionTo('subscription_show');
        $role1->givePermissionTo('subscription_access');


        // create roles and assign existing permissions
        $role2 = Role::create(['name' => 'Member']);

        // create permissions (document)
        $role2->givePermissionTo('document_access');
        $role2->givePermissionTo('document_show');
        $role2->givePermissionTo('document_download');

        $role3 = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
