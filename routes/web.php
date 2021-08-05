<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//Profile
Route::get('profile', 'AdminController@profile');
Route::post('/update-profile','AdminController@update_profile');

//{{ EMPLOYEES ROUTES ARE HERE.........
Route::get('/add-employee','EmployeeController@add_employee')->name('add.employee');
Route::get('/all-employee','EmployeeController@all_employee')->name('all.employee');
Route::post('/add-employee','EmployeeController@save_employee')->name('save.employee');
Route::get('/view-employee/{id}','EmployeeController@view_employee');
Route::get('/edit-employee/{id}','EmployeeController@edit_employee');
Route::post('/update-employee/{id}','EmployeeController@update_employee');
Route::get('/delete-employee/{id}','EmployeeController@delete_employee');
//{{END OF EMPLOYEE ROUTES.............

//{{ CUSTOMERS ROUTES ARE HERE...........
Route::get('/add-customer','CustomerController@add_customer')->name('add.customer');
Route::get('/all-customer','CustomerController@all_customer')->name('all.customer');
Route::post('/add-customer','CustomerController@save_customer')->name('save.customer');
Route::get('/view-customer/{id}','CustomerController@view_customer');
Route::get('/edit-customer/{id}','CustomerController@edit_customer');
Route::post('/update-customer/{id}','CustomerController@update_customer');
Route::get('/delete-customer/{id}','CustomerController@delete_customer');
//{{END OF CUSTOMER ROUTES.............

//{{ SUPPLIERS ROUTE ARE HERE...........
Route::get('/add-supplier','SupplierController@add_supplier')->name('add.supplier');
Route::get('/all-supplier','SupplierController@all_supplier')->name('all.supplier');
Route::post('/add-supplier','SupplierController@save_supplier')->name('save.supplier');
Route::get('/view-supplier/{id}','SupplierController@view_supplier');
Route::get('/edit-supplier/{id}','SupplierController@edit_supplier');
Route::post('/update-supplier/{id}','SupplierController@update_supplier');
Route::get('/delete-supplier/{id}','SupplierController@delete_supplier');
//{{END OF SUPPLIER ROUTES.............

//{{SALARY ROUTES ARE HERE...........
Route::get('/add-advance-salary','SalaryController@add_advance_salary')->name('add.advance.salary');
Route::get('/all-advance-salary','SalaryController@all_advance_salary')->name('all.advance.salary');
Route::post('/add-advance-salary','SalaryController@save_advance_salary')->name('save.advance.salary');
Route::get('/view-advance-salary/{id}','SalaryController@view_salary');
Route::get('/edit-advance-salary/{id}','SalaryController@edit_salary');
Route::post('/update-advance-salary/{id}','SalaryController@update_salary');
Route::get('/delete-advance-salary/{id}','SalaryController@delete_salary');
Route::get('/pay-salary','SalaryController@pay_salary')->name('pay.salary');

//{{ CATEGORY ROUTES ARE HERE..........
Route::get('/add-category','CategoryController@add_category')->name('add.category');
Route::get('/all-category','CategoryController@all_category')->name('all.category');
Route::post('/save-category','CategoryController@save_category')->name('save.category');
Route::get('/edit-category/{id}','CategoryController@edit_category');
Route::post('/update-category/{id}','CategoryController@update_category');
Route::get('/delete-category/{id}','CategoryController@delete_category');

//{{ PRODUCT ROUTES ARE HERE........
Route::get('/add-product','ProductController@add_product')->name('add.product');
Route::get('/all-product','ProductController@all_product')->name('all.product');
Route::post('/add-product','ProductController@save_product')->name('save.product');
Route::get('/view-product/{id}','ProductController@view_product');
Route::get('/edit-product/{id}','ProductController@edit_product');
Route::post('/update-product/{id}','ProductController@update_product');
Route::get('/delete-product/{id}','ProductController@delete_product');

//Import and Export Products Route Are Here
Route::get('/import-product','ProductController@import_product')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');

//{{ EXPENSE ROUTE ARE HERE......
Route::get('/add-expense','ExpenseController@add_expense')->name('add.expense');
Route::post('/add-expense','ExpenseController@save_expense')->name('save.expense');
Route::get('/today-expense','ExpenseController@today_expense')->name('today.expense');
Route::get('/edit-today-expense/{id}','ExpenseController@edit_expense');
Route::post('/edit-today-expense/{id}','ExpenseController@update_expense');
Route::get('/delete-today-expense/{id}','ExpenseController@delete_expense');
Route::get('/this-month-expense','ExpenseController@thismonth_expense');
Route::get('/yearly-expense','ExpenseController@yearly_expense');

//{{ Month wise Expense route are here......
Route::get('/january-expense','ExpenseController@january_expense')->name('january.expense');
Route::get('/february-expense','ExpenseController@february_expense')->name('february.expense');
Route::get('/march-expense','ExpenseController@march_expense')->name('march.expense');
Route::get('/april-expense','ExpenseController@april_expense')->name('april.expense');
Route::get('/may-expense','ExpenseController@may_expense')->name('may.expense');
Route::get('/june-expense','ExpenseController@june_expense')->name('june.expense');
Route::get('/july-expense','ExpenseController@july_expense')->name('july.expense');
Route::get('/august-expense','ExpenseController@august_expense')->name('august.expense');
Route::get('/september-expense','ExpenseController@september_expense')->name('september.expense');
Route::get('/october-expense','ExpenseController@october_expense')->name('october.expense');
Route::get('/november-expense','ExpenseController@november_expense')->name('november.expense');
Route::get('/december-expense','ExpenseController@december_expense')->name('december.expense');

//{{ ATTENDANCE  ROUTE ARE HERE............
Route::get('/take-attendance','AttendanceController@take_attendance')->name('take.attendance');
Route::post('/save-attendance','AttendanceController@save_attendance')->name('save.attendance');
Route::get('/all-attendance','AttendanceController@all_attendance')->name('all.attendance');
Route::get('/edit-attendance/{edit_date}','AttendanceController@edit_attendance');
Route::post('/update-attendance','AttendanceController@update_attendance');
Route::get('/view-attendance/{edit_date}','AttendanceController@view_attendance');

//Cart Route
Route::post('/add-cart','CartController@add_cart');
Route::post('/cart-update/{rowId}','CartController@update_cart');
Route::get('/cart-remove/{rowId}','CartController@cart_remove');

//Invoice Route are Here
Route::post('/create-invoice','CartController@create_invoice');
Route::post('/final-invoice','CartController@final_invoice');

//{{ SETTINGS ROUTE ARE HERE......
///Route::get('/settings/{id}','SettingsController@settings')->name('edit.setting');
Route::get('/setting','SettingsController@settings')->name('setting');
Route::post('/update-company/{id}','SettingsController@update_settings');

//Routes For Pos
Route::get('/pos','PosController@index')->name('pos');
Route::get('/pending-order','PosController@pending_order')->name('pending.orders');
Route::get('/view-order-status/{id}','PosController@view_order');
Route::get('/pos-done/{id}','PosController@pos_done');
Route::get('/success-order','PosController@sucess_order')->name('success.order');
//Route::get('Inbox', function () {
//    echo "Inbox";
//})->middleware('verified');

//{{ END OF PRODUCTS ROUTE...
//Route::group(['middleware'=>'verified'], function ()
//{
Route::get('/Inbox',function (){
    echo "index";
})->name('Inbox');
Route::get('/calander',function (){
    echo "calander";
})->name('calander');
Route::get('/typography',function (){
    echo "typography";
})->name('typography');
//});

Route::resource('post','PostController');
Route::get('all/post','PostController@allpost')->name('all.post');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
