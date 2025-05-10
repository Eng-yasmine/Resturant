# My Laravel Learning Log

هنا بكتب كل يوم أنا اشتغلت فيه على المشروع ده، علشان أتابع تقدمي وأراجع أي مشكلة لو رجعت له بعد فترة.

---

## Day 1 - [30-4-2025]
*اليوم اشتغلت على:*
 [Laravel Breeze]
 [RESTful API]
 [migration-model-Factory-seeders-Controller]
 [run migrations]


*الخطوات اللي عملتها:*
- `composer require laravel/breeze --dev`
- `php artisan breeze:install`
- `php artisan migrate`
- `npm install`
- `npm run dev`
- **
- *to create migrations , Model , Factory , Seeder , Controller , FormRequest ,Policy*
- `php artisan make:model Model -a`

## Day 2 - [1-5-2025]
*اليوم اشتغلت على:*
[Eloquent Relationships]

[تطبيق علاقات hasMany و belongsTo]

[تحديد الجدول الأب والابن ووضع الـ foreign keys في مكانها الصحيح]

*الخطوات اللي عملتها:*

 ## Day 2 - [1-5-2025]  
*Today's focus:*  
[`hasMany`] and [`belongsTo`] Eloquent Relationships  
[`foreign keys`] and identifying the [`parent`] and [`child`] tables

---

**Steps I completed:**

- Defined a relationship between `orders` and `order_details`:  
  - `Order` → `hasMany(OrderDetail::class)`  
  - `OrderDetail` → `belongsTo(Order::class)`
  - `Contact` → `belongsTo(User::class)`

- Understood where the `foreign key` should be placed and wrote it inside the `order_details` migration.

- Applied the same concept to `menu_items` and `feedbacks`:  
  - `MenuItem` → `hasMany(Feedback::class)`  
  - `Feedback` → `belongsTo(MenuItem::class)`

- Reviewed the relationship between `posts` and `employees`, and confirmed correct usage of:  
  - `foreignId('employee_id')->constrained()->cascadeOnDelete();`

 ## Day 2 - [4-5-2025]
 -`use automaticallyEagerLoading`
 -`use paginator`

**Steps I completed:**
1-Appserviceprovider->boot(){
 Model::automaticallyEagerLoadRelationships();
 Paginator::useBootstrapFive();
}

## Day 3 - [10-5-2025]  
*اليوم اشتغلت على:*  
[Admin CRUD - إدارة المستخدمين]  
[عرض عدد المستخدمين في الموقع]  
[CRUD لرسائل صفحة Contact]  

---

**Steps I completed:**

- أنشأت لوحة تحكم لـ **Admin**:
  - Admin يقدر يعمل **CRUD** للمستخدمين:
    - إضافة مستخدم جديد مع تحديد الـ **role** (admin أو user)
    - تعديل بيانات المستخدم
    - حذف مستخدم
    - عرض قائمة بكل المستخدمين
  - عرض إجمالي عدد المستخدمين الموجودين في قاعدة البيانات.

- أنشأت قسم لعرض كل **الرسائل المرسلة من صفحة Contact**:
  - Admin يقدر يشوف:
    - اسم المرسل
    - الإيميل
    - محتوى الرسالة
  - تم بناء CRUD كامل للرسائل (قراءة / حذف).

---

