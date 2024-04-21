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
            'استعلام عن جهاز',
            'استعلام عن اجهزة',
            'اضافة مستخدم',
            'حذف مستخدم',
            'تعديل بيانات مستخدم',
            'استعلام عن مستخدم',
            'استعلام عن مستخدمين',
            'عرض العملاء',
            'عرض عميل',
            'اضافة عميل',
            'تعديل عميل',
            'حذف عميل',
            'استرجاع عميل',
            ' حذف عميل نهائيا',
            'عرض الاجهزة التي تم تسليمها',
            'عرض الجهاز التي تم تسليمها',
            'تعديل بيانات جهاز تم تسليمه',
            'حذف بيانات جهاز تم تسليمه',
            'تسليم جهاز',
            'عرض الطلبات',
            'عرض الطلب',
            'اضافة طلب',
            'تعديل طلب',
            'حذف طلب',
            'استرجاع طلب',
            'حذف طلب نهائيا',
            'عرض الصلاحيات',
            'عرض صلاحية',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'استرجاع صلاحية',
            'حذف صلاحية نهائيا',
            'عرض المنتجات',
            'عرض منتج',
            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',
            'استرجاع منتج',
            'حذف منتج نهائيا',
            'عرض الادوار',
            'عرض دور',
            'اضافة دور',
            'تعديل دور',
            'حذف دور',
            'عرض الخدمات',
            'عرض خدمة',
            'اضافة خدمة',
            'تعديل خدمة',
            'حذف خدمة',
            'استرجاع خدمة',
            'حذف خدمة نهائيا',
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
            'الاستعلام عن صلاحيات الدور',
            'تعيين صلاحيات للادوار',
            'تحديث صلاحيات الادوار',
            'ازالة صلاحيات من الادوار',
            'عرض الزبائن',
            'عرض زبون',
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

