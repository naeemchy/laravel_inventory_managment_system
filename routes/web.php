<?php 

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inbox', function () {
    echo "inbox";
})->name('inbox')->middleware('verified');


/* all employee route are here */
Route::get('/add-employee', 'EmployeeController@index')->name('add.employe');
Route::post('/insert-employee', 'EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@all_employe')->name('all.employe');
Route::get('/view-employee/{id}', 'EmployeeController@view_employee');
Route::get('/edit-employee/{id}', 'EmployeeController@edit_employee');
Route::post('/update-employee/{id}', 'EmployeeController@update_employee');
Route::get('/delete-employee/{id}', 'EmployeeController@delete_employee');


/* all  customer route are here */
Route::get('/add-customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert-customer', 'CustomerController@store');
Route::get('/all-customer', 'CustomerController@all_customer')->name('all.customer');
Route::get('/view-customer/{id}', 'CustomerController@view_customer');
Route::get('/delete-customer/{id}', 'CustomerController@delete_customer');
Route::get('/edit-customer/{id}', 'CustomerController@edit_customer');
Route::post('/update-customer/{id}', 'CustomerController@update_customer');


/* all  Supplyers route are here */
Route::get('/add-supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier', 'SupplierController@store');
Route::get('/all-supplier', 'SupplierController@all_supplier')->name('all.supplier');
Route::get('/view-supplier/{id}', 'SupplierController@view_supplier');
Route::get('/delete-supplier/{id}', 'SupplierController@delete_supplier');
Route::get('/edit-supplier/{id}', 'SupplierController@edit_supplier');
Route::post('/update-supplier/{id}', 'SupplierController@update_supplier');



/* all Salaries route are here */
Route::get('/add-advance-salaries', 'Salaries_Controller@advance_salary')->name('add.advanced_salaries');
Route::post('/insert-advance-salary', 'Salaries_Controller@insert_advance_salary');
Route::get('/all-advance-salaries', 'Salaries_Controller@all_advance_salary')->name('all.advanced_salaries');
Route::get('/edit-advance-salary/{id}', 'Salaries_Controller@edit_advance_salary');
Route::post('/update-advance-selary/{id}', 'Salaries_Controller@update_advance_selary');
Route::get('/delete-advance-salary/{id}', 'Salaries_Controller@delete_advance_salary');

Route::get('/pay-salaries', 'Salaries_Controller@pay_salaries')->name('pay.salaries');



/* all category route are here */
Route::get('/add-category', 'CategoryController@add_category')->name('add.category');
Route::post('/insert-category', 'CategoryController@insert_category');
Route::get('/all-category', 'CategoryController@all_category')->name('all.category');
Route::get('/delete-catedory/{id}', 'CategoryController@delete_catedory');
Route::get('/edit-catedory/{id}', 'CategoryController@edit_catedory');
Route::post('/update-category/{id}', 'CategoryController@update_category');


/* all products route are here */
Route::get('/add-product', 'ProductController@add_product')->name('add.product');
Route::get('/all-product', 'ProductController@all_product')->name('all.product');
Route::post('/insert-product', 'ProductController@insert_product');
Route::get('/delete-product/{id}', 'ProductController@delete_product');
Route::get('/view-product/{id}', 'ProductController@view_product');
Route::get('/edit-product/{id}', 'ProductController@edit_product');
Route::post('/update-product/{id}', 'ProductController@update_product');
/* excel import and export products route */
Route::get('/import-product', 'ProductController@excel_import_product')->name('import.product');
Route::get('/export', 'ProductController@export')->name('export');
Route::post('/import', 'ProductController@import')->name('import');


/* all expense route are here */
Route::get('/add-expense', 'ExpenseController@add_expense')->name('add.expense');
Route::post('/insert-expense', 'ExpenseController@insert_expense');
Route::get('/today.expense', 'ExpenseController@today_expense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@edit_today_expense');
Route::post('/update-today-expense/{id}', 'ExpenseController@update_today_expense');
Route::get('/delete-today-expense/{id}', 'ExpenseController@delete_today_expense');
Route::get('/monthly.expense', 'ExpenseController@monthly_expense')->name('monthly.expense');
Route::get('/yearly.expense', 'ExpenseController@yearly_expense')->name('yearly.expense');
Route::get('/january.expense', 'ExpenseController@january_expense')->name('january.expense');
Route::get('/february.expense', 'ExpenseController@february_expense')->name('february.expense');
Route::get('/march.expense', 'ExpenseController@march_expense')->name('march.expense');
Route::get('/april.expense', 'ExpenseController@april_expense')->name('april.expense');
Route::get('/may.expense', 'ExpenseController@may_expense')->name('may.expense');
Route::get('/june.expense', 'ExpenseController@june_expense')->name('june.expense');
Route::get('/july.expense', 'ExpenseController@july_expense')->name('july.expense');
Route::get('/augest.expense', 'ExpenseController@augest_expense')->name('augest.expense');
Route::get('/september.expense', 'ExpenseController@september_expense')->name('september.expense');
Route::get('/octber.expense', 'ExpenseController@octber_expense')->name('octber.expense');
Route::get('/november.expense', 'ExpenseController@november_expense')->name('november.expense');
Route::get('/december.expense', 'ExpenseController@december_expense')->name('december.expense');



/* all attendance route are here */
Route::get('/take.attendance', 'AttendanceController@take_attendance')->name('take.attendance');
Route::post('/insert-attendance', 'AttendanceController@insert_attendance');
Route::get('/all.attendance', 'AttendanceController@all_attendance')->name('all.attendance');
Route::get('/edit-attendance/{edit_date}', 'AttendanceController@edit_attendance');
Route::post('/update-attendance', 'AttendanceController@update_attendance');
Route::get('/view-adattennce/{edit_date}', 'AttendanceController@view_adattennce');
Route::get('/delete-attendance/{edit_date}', 'AttendanceController@delete_attendance');


/* all settings route are here */
Route::get('/settings', 'AttendanceController@settings')->name('settings');
Route::post('/update-website/{id}', 'AttendanceController@update_website');


/* pos route are here */
Route::get('/pos', 'PosController@pos')->name('pos');
Route::get('/panding/orders', 'PosController@panding_orders')->name('panding.orders');
Route::get('/success/orders', 'PosController@success_orders')->name('success.orders');
Route::get('/view-order-status/{id}', 'PosController@view_order_status');
Route::get('/pos-done/{id}', 'PosController@pos_done');


/* cart route are here */
Route::post('/add-cart', 'CartController@add_cart');
Route::post('/cart-update/{rowId}', 'CartController@cart_update');
Route::get('/cart-remove/{rowId}', 'CartController@cart_remove');
Route::post('/create-invoice', 'CartController@create_invoice');
Route::post('/final-invoice', 'CartController@final_invoice');



//frontaend route
Route::get('/pos_home', 'PosHomeController@pos_home')->name('pos_home');
