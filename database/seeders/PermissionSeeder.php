<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'اضافة جهاز',
            'حذف جهاز',
            'تعديل بيانات جهاز',
            'الاسنعلام عن جهاز',
            'اضافة مستخدم',
            'الاسنعلام عن الاجهزة',
            'حذف مستخدم',
            'تعديل بيانات مستخدم',
            'الاسنعلام عن مستخدم',
            'الاسنعلام عن المستخدمين',
            'الاسنعلام عن العملاء',
            'الاسنعلام عن عميل',
            'تعديل عميل',
            'حذف عميل',
            'الاسنعلام عن الاجهزة التي تم تسليمها',
            'الاسنعلام عن جهاز تم تسليمه',
            'تعديل بيانات جهاز تم تسليمه',
            'حذف بيانات جهاز تم تسليمه',
            'تسليم جهاز',
            'الاسنعلام عن الطلبات',
            'الاسنعلام عن طلب',
            'اضافة طلب',
            'تعديل طلب',
            'حذف طلب',
            'الاسنعلام عن الصلاحيات',
            'الاسنعلام عن صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'الاسنعلام عن المنتجات',
            'الاسنعلام عن منتج',
            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',
            'الاسنعلام عن الادوار',
            'الاسنعلام عن دور',
            'اضافة دور',
            'تعديل دور',
            'حذف دور',
            'الاسنعلام عن الخدمات',
            'الاسنعلام عن خدمة',
            'اضافة خدمة',
            'تعديل خدمة',
            'حذف خدمة',
            'الاستعلام عن صلاحيات المستخدمين',
            'الاستعلام عن صلاحيات مستخدم',
            'تعيين صلاحيات للمستخدمين',
            'تحديث صلاحيات المستخدم',
            'ازالة صلاحيات من المستخدمين',
            'الاستعلام عن صلاحيات العملاء',
            'الاستعلام عن صلاحيات عميل',
            'تعيين صلاحيات للعملاء',
            'تحديث صلاحيات العميل',
            'ازالة صلاحيات من العملاء',
            'الاستعلام عن صلاحيات الادوار',
            'الاستعلام عن صلاحيات دور',
            'تعيين صلاحيات للادوار',
            'تحديث صلاحيات الادوار',
            'ازالة صلاحيات من الادوار',
            'الاسنعلام عن الزبائن',
            'الاسنعلام عن زبون',
            'اضافة زبون',
            'تعديل زبون',
            'حذف زبون',
            'استعلام عن طلبات الاجهزة',
            'استعلام عن طلب جهاز',
            'اضافة طلب لجهاز',
            'تعديل بيانات طلب لجهاز',
            'استعلام عن طلبات المنتجات',
            'استعلام عن طلب منتج',
            'اضافة طلب لمنتج',
            'تعديل بيانات طلب لمنتج',
            'حذف طلب منتج',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name'=>$permission
            ]);
        }
    }
}

