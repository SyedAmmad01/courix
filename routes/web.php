<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return redirect(route('login'));
});

Auth::routes();



Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [App\Http\Controllers\Admin\AdminController::class, 'authenticate'])->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');





        // Employee Routes On Admin
        Route::get('/employee/allEmployees', [App\Http\Controllers\Admin\EmployeeController::class, 'allEmployees'])->name('admin.employee.all_employees');
        Route::get('/employee/addEmployee', [App\Http\Controllers\Admin\EmployeeController::class, 'addEmployee'])->name('admin.employee.add_employee');
        Route::get('/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('admin.employee.edit');
        Route::get('/employee/view_employee/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'view_employees_details'])->name('admin.employee.view_employees');
        Route::post('/employee/save', [App\Http\Controllers\Admin\EmployeeController::class, 'save'])->name('admin.employee.save');
        Route::post('/employee/update', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('admin.employee.update');
        Route::post('/employee/job_title', [App\Http\Controllers\Admin\EmployeeController::class, 'job_title_save'])->name('admin.employee.job_title_save');
        Route::delete('/employee/delete/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('admin.employee.delete');
        //

        // Driver Routes On Admin
        Route::get('/driver/allDriver', [App\Http\Controllers\Admin\DriverController::class, 'allDriver'])->name('admin.driver.all_driver');
        Route::post('/driver/get_name', [App\Http\Controllers\Admin\DriverController::class, 'get_name'])->name('admin.driver.get_name');
        Route::post('/driver/getarea', [App\Http\Controllers\Admin\DriverController::class, 'getarea'])->name('admin.driver.getarea');
        Route::post('/driver/save', [App\Http\Controllers\Admin\DriverController::class, 'save'])->name('admin.driver.save');
        Route::get('/driver/edit/{id}', [App\Http\Controllers\Admin\DriverController::class, 'edit'])->name('admin.driver.edit');
        Route::post('driver/update', [App\Http\Controllers\Admin\DriverController::class, 'update'])->name('admin.driver.update');
        Route::delete('/driver/delete/{id}', [App\Http\Controllers\Admin\DriverController::class, 'destroy'])->name('admin.driver.delete');
        Route::get('/driver/status-update/{id}',[App\Http\Controllers\Admin\DriverController::class, 'status_update'])->name('admin.driver.status-update');
        //


        // Shipper Routes On Admin
        // Route::get('/shipper/rates', [App\Http\Controllers\Admin\ShipperController::class, 'rates'])->name('admin.shipper.rates');
        Route::get('/shipper/index', [App\Http\Controllers\Admin\ShipperController::class, 'index'])->name('admin.shipper.index');
        Route::get('/shipper/add', [App\Http\Controllers\Admin\ShipperController::class, 'add'])->name('admin.shipper.add');
        Route::get('/shipper/edit/{id}', [App\Http\Controllers\Admin\ShipperController::class, 'edit'])->name('admin.shipper.edit');
        Route::post('/shipper/save', [App\Http\Controllers\Admin\ShipperController::class, 'save'])->name('admin.shipper.save');
        Route::post('/shipper/update', [App\Http\Controllers\Admin\ShipperController::class, 'update'])->name('admin.shipper.update');
        Route::post('/shipper/getcity', [App\Http\Controllers\Admin\ShipperController::class, 'getcity'])->name('admin.shipper.getcity');
        Route::post('/shipper/getarea', [App\Http\Controllers\Admin\ShipperController::class, 'getarea'])->name('admin.shipper.getarea');
        Route::delete('/shipper/delete/{id}', [App\Http\Controllers\Admin\ShipperController::class, 'destroy'])->name('admin.shipper.delete');
        Route::get('/shipper/view_shipper/{id}', [App\Http\Controllers\Admin\ShipperController::class, 'view_shippers_details'])->name('admin.shipper.view');
        Route::post('/shipper/quick_add', [App\Http\Controllers\Admin\ShipperController::class, 'quick_add'])->name('admin.shipper.quick_add');

        Route::get('/export-shippers', [App\Http\Controllers\Admin\ExportController::class, 'exportShippersToExcel'])->name('admin.exportshippersToExcel');


        

        // Route::post('/shipper/export-excel', [App\Http\Controllers\Admin\ShipperController::class, 'exportexcel'])->name('admin.shipper.quick_add');

        // Route::get('/shipper/rate/{id}', [App\Http\Controllers\Admin\ShipperController::class, 'rate'])->name('admin.shipper.rate');
        //

        // Contact Person Routes On Admin
        Route::post('/contact_person/contact_person_save', [App\Http\Controllers\Admin\ContactPersonController::class, 'contact_person_save'])->name('admin.contact_person.contact_person_save');
        Route::post('/contact_person/add_get', [App\Http\Controllers\Admin\ContactPersonController::class, 'add_get'])->name('admin.contact_person.add_get');
        Route::delete('/contact_person/delete/{id}', [App\Http\Controllers\Admin\ContactPersonController::class, 'destroy'])->name('admin.contact_person.delete');
        Route::post('/contact_person/edit_save', [App\Http\Controllers\Admin\ContactPersonController::class, 'edit_save'])->name('admin.contact_person.edit_save');
        Route::post('/contact_person/get_values', [App\Http\Controllers\Admin\ContactPersonController::class, 'get_values'])->name('admin.contact_person.get_values');
        Route::post('/contact_person/edit_values', [App\Http\Controllers\Admin\ContactPersonController::class, 'edit_values'])->name('admin.contact_person.edit_values');
        Route::post('/contact_person/update', [App\Http\Controllers\Admin\ContactPersonController::class, 'update'])->name('admin.contact_person.update');
        //

        // Shipper Files Routes On Admin
        Route::post('/shipper_files/shipper_files_save', [App\Http\Controllers\Admin\ShipperFileController::class, 'shipper_files_save'])->name('admin.shipper_files.shipper_files_save');
        Route::post('/shipper_files/edit_add_shipper_files_save', [App\Http\Controllers\Admin\ShipperFileController::class, 'edit_add_shipper_files_save'])->name('admin.shipper_files.edit_add_shipper_files_save');
        Route::get('/shipper_files/edit/{id}', [App\Http\Controllers\Admin\ShipperFileController::class, 'edit'])->name('admin.shipper_files.edit');
        Route::post('/shipper_files/get', [App\Http\Controllers\Admin\ShipperFileController::class, 'get'])->name('admin.shipper_files.get');
        Route::post('/shipper_files/add_get', [App\Http\Controllers\Admin\ShipperFileController::class, 'add_get'])->name('admin.shipper_files.add_get');
        Route::delete('/shipper_files/delete/{id}', [App\Http\Controllers\Admin\ShipperFileController::class, 'destroy'])->name('admin.shipper_files.delete');
        Route::post('/shipper_files/update', [App\Http\Controllers\Admin\ShipperFileController::class, 'update'])->name('admin.shipper_files.update');
        //

        // Shipper Rates Routes On Admin
        Route::get('/shipper/rates', [App\Http\Controllers\Admin\RateController::class, 'rates'])->name('admin.shipper.rates');
        Route::get('/shipper/rate/{id}', [App\Http\Controllers\Admin\RateController::class, 'rate'])->name('admin.shipper.rate');
        Route::post('/shipper/rates/save', [App\Http\Controllers\Admin\RateController::class, 'add_rates_all_cities'])->name('admin.shipper.rates_save');
        Route::post('/shipper/rates/city_save', [App\Http\Controllers\Admin\RateController::class, 'add_rates_city_wise'])->name('admin.shipper.rates_city_save');
        Route::post('/shipper/get_name', [App\Http\Controllers\Admin\RateController::class, 'get_name'])->name('admin.shipper.get_name');
        Route::post('/shipper/rtos/save', [App\Http\Controllers\Admin\RateController::class, 'add_rtos_rate'])->name('admin.shipper.add_rtos_rate');
        Route::post('/shipper/rtos/city_save', [App\Http\Controllers\Admin\RateController::class, 'add_rtos_city_wise'])->name('admin.shipper.add_rtos_city_save');
        Route::post('/shipper/get_rtos_name', [App\Http\Controllers\Admin\RateController::class, 'get_rtos_name'])->name('admin.shipper.get_rtos_name');
        Route::post('/shipper/oda/save', [App\Http\Controllers\Admin\RateController::class, 'oda_rate'])->name('admin.shipper.oda_rate');
        Route::post('/shipper/oda/city_save', [App\Http\Controllers\Admin\RateController::class, 'add_oda_city_wise'])->name('admin.shipper.add_oda_city_save');
        Route::post('/shipper/get_oda_name', [App\Http\Controllers\Admin\RateController::class, 'get_oda_name'])->name('admin.shipper.get_oda_name');

        // Shipment Routes On Admin
        Route::get('/shipment/tracking', [App\Http\Controllers\Admin\ShipmentController::class, 'tracking'])->name('admin.shipment.tracking');
        Route::post('/shipment/get_search', [App\Http\Controllers\Admin\ShipmentController::class, 'get_search'])->name('admin.shipment.get_search');
        Route::get('/shipment/place_order', [App\Http\Controllers\Admin\ShipmentController::class, 'place_order'])->name('admin.shipment.place_order');
        Route::post('/shipment/save', [App\Http\Controllers\Admin\ShipmentController::class, 'save'])->name('admin.shipment.save');
        Route::get('/shipment/print_awb', [App\Http\Controllers\Admin\ShipmentController::class, 'print_awb'])->name('admin.shipment.print_awb');
        Route::post('/shipment/getcity', [App\Http\Controllers\Admin\ShipmentController::class, 'getcity'])->name('admin.shipment.getcity');
        Route::post('/shipment/getarea', [App\Http\Controllers\Admin\ShipmentController::class, 'getarea'])->name('admin.shipment.getarea');
        Route::post('/shipment/get_name', [App\Http\Controllers\Admin\ShipmentController::class, 'get_name'])->name('admin.shipment.get_name');
        Route::post('/shipment/order_edit', [App\Http\Controllers\Admin\ShipmentController::class, 'order_edit'])->name('admin.shipment.order_edit');
        Route::post('/shipment/order_update', [App\Http\Controllers\Admin\ShipmentController::class, 'order_update'])->name('admin.shipment.order_update');
        Route::post('/shipment/update_order', [App\Http\Controllers\Admin\ShipmentController::class, 'update_order'])->name('admin.shipment.update_order');
        Route::post('/shipment/get_rates', [App\Http\Controllers\Admin\ShipmentController::class, 'get_rates'])->name('admin.shipment.get_rates');
        Route::post('/shipment/get_weight', [App\Http\Controllers\Admin\ShipmentController::class, 'get_weight'])->name('admin.shipment.get_weight');

        // Route::post('/shipment/edit_order', [App\Http\Controllers\Admin\ShipmentController::class, 'edit_order'])->name('admin.shipment.edit_order');

        Route::get('/shipment/upload_shipments', [App\Http\Controllers\Admin\ShipmentController::class, 'upload_shipments'])->name('admin.shipment.upload_shipments');
        Route::post('/shipment/import_shipments', [App\Http\Controllers\Admin\ShipmentController::class, 'import_shipments'])->name('admin.shipment.import_shipments');
        // Route::post('/shipment/save_data', [App\Http\Controllers\Admin\ShipmentController::class, 'save_data'])->name('admin.shipment.save_data');
        Route::post('/shipment/save_shipments', [App\Http\Controllers\Admin\ShipmentController::class, 'save_shipments'])->name('admin.shipment.save_shipments');

        Route::get('/shipment/create_booking', [App\Http\Controllers\Admin\ShipmentController::class, 'create_booking'])->name('admin.shipment.create_booking');
        Route::post('/shipment/booking_save', [App\Http\Controllers\Admin\ShipmentController::class, 'booking_save'])->name('admin.shipment.booking_save');
        Route::get('/shipment/booking_edit/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'booking_edit'])->name('admin.shipment.booking_edit');
        Route::post('/shipment/booking_update', [App\Http\Controllers\Admin\ShipmentController::class, 'booking_update'])->name('admin.shipper.booking_update');
        Route::delete('/shipment/booking_delete/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'booking_destroy'])->name('admin.shipper.booking_delete');

        Route::get('/shipment/booking_pdf/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'booking_pdf'])->name('admin.shipment.booking_pdf');




        Route::get('/shipment/operation_dashboard', [App\Http\Controllers\Admin\ShipmentController::class, 'operation_dashboard'])->name('admin.shipment.operation_dashboard');
        Route::get('/shipment/get_manifest', [App\Http\Controllers\Admin\ShipmentController::class, 'get_manifest_download'])->name('admin.shipment.get_manifest');
        Route::get('/shipment/update_status', [App\Http\Controllers\Admin\ShipmentController::class, 'update_status'])->name('admin.shipment.update_status');
        Route::get('/sms/send_sms', [App\Http\Controllers\Admin\ShipmentController::class, 'send_sms'])->name('admin.shipment.send_sms');
        Route::get('/shipment/edit_place_order', [App\Http\Controllers\Admin\ShipmentController::class, 'edit_place_order'])->name('admin.shipment.edit_place_order');
        Route::get('/reports/add_collection', [App\Http\Controllers\Admin\ShipmentController::class, 'add_collection'])->name('admin.shipment.add_collection');
        Route::get('/shipment/shipment_audits', [App\Http\Controllers\Admin\ShipmentController::class, 'shipment_audits'])->name('admin.shipment.all_shipment_audit');
        Route::post('/shipment/get_tracking', [App\Http\Controllers\Admin\ShipmentController::class, 'get_tracking'])->name('admin.shipment.get_tracking');
        Route::get('/shipment/shipment_view/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'shipment_view'])->name('admin.shipment.shipment_view');


        Route::post('/shipment/operation_print_airways', [App\Http\Controllers\Admin\ShipmentController::class, 'operation_print_airways'])->name('admin.shipment.operation_print_airways');

        Route::post('/shipment/getzone', [App\Http\Controllers\Admin\ShipmentController::class, 'getzone'])->name('admin.shipment.getzone');
        Route::post('/shipment/get_orders', [App\Http\Controllers\Admin\ShipmentController::class, 'get_orders'])->name('admin.shipment.get_orders');
        Route::post('/shipment/search_bar', [App\Http\Controllers\Admin\ShipmentController::class, 'search_bar'])->name('admin.shipment.search_bar');
        Route::post('/shipment/data', [App\Http\Controllers\Admin\ShipmentController::class, 'data'])->name('admin.shipment.data');
        Route::delete('/shipment/delete', [App\Http\Controllers\Admin\ShipmentController::class, 'destroy'])->name('admin.shipment.delete');
        Route::post('/shipment/get_update', [App\Http\Controllers\Admin\ShipmentController::class, 'get_update'])->name('admin.shipment.get_update');
        Route::post('/shipment/batch_print_airways_bills', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_print_airways_bills'])->name('admin.shipment.batch_print_airways_bills');
        Route::post('/shipment/tracking_print_airways_bills', [App\Http\Controllers\Admin\ShipmentController::class, 'tracking_print_airways_bills'])->name('admin.shipment.tracking_print_airways_bills');
        Route::post('/shipment/batch_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_update'])->name('admin.shipment.batch_update');
        Route::post('/shipment/batch_city_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_city_update'])->name('admin.shipment.batch_city_update');
        Route::post('/shipment/batch_outscan_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_outscan_update'])->name('admin.shipment.batch_outscan_update');
        Route::post('/shipment/batch_inscan_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_inscan_update'])->name('admin.shipment.batch_inscan_update');
        Route::post('/shipment/batch_comment_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_comment_update'])->name('admin.shipment.batch_comment_update');
        Route::post('/shipment/batch_service_charges_update', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_service_charges_update'])->name('admin.shipment.batch_service_charges_update');
        Route::post('/shipment/batch_assign_to_third_party', [App\Http\Controllers\Admin\ShipmentController::class, 'batch_assign_to_third_party'])->name('admin.shipment.batch_assign_to_third_party');
        Route::post('/shipment/export_to_excel', [App\Http\Controllers\Admin\ExportController::class, 'exportToExcel'])->name('admin.shipment.exportToExcel');
        Route::post('/shipment/details_export_to_excel', [App\Http\Controllers\Admin\ExportController::class, 'detailsexportToExcel'])->name('admin.shipment.detailsexportToExcel');
        Route::post('/shipment/download_sample_excel', [App\Http\Controllers\Admin\ExportController::class, 'download_sample_excel'])->name('admin.shipment.download_sample_excel');
        Route::post('/shipment/single_export_to_excel', [App\Http\Controllers\Admin\ExportController::class, 'singleexportToExcel'])->name('admin.shipment.singleexportToExcel');


        Route::post('/shipment/update_status_search_bar', [App\Http\Controllers\Admin\ShipmentController::class, 'update_status_search_bar'])->name('admin.shipment.update_status_search_bar');
        Route::post('/shipment/single_batch_update', [App\Http\Controllers\Admin\ShipmentController::class, 'single_batch_update'])->name('admin.shipment.single_batch_update');



        Route::get('/shipment/get_edit_orders/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'get_edit_orders'])->name('admin.shipment.get_edit_orders');
        Route::post('/shipment/update_location', [App\Http\Controllers\Admin\ShipmentController::class, 'update_location'])->name('admin.shipment.update_location');
        Route::delete('/shipment/logs/delete/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'delete_logs'])->name('admin.logs.delete_logs');
        Route::post('/shipment/tracking_comments', [App\Http\Controllers\Admin\ShipmentController::class, 'tracking_comments'])->name('admin.shipment.tracking_comments');
        Route::post('/shipment/get_comments', [App\Http\Controllers\Admin\ShipmentController::class, 'get_comments'])->name('admin.shipment.get_comments');
        Route::post('/shipment/tracking_remarks', [App\Http\Controllers\Admin\ShipmentController::class, 'tracking_remarks'])->name('admin.shipment.tracking_remarks');
        Route::post('/shipment/get_remarks', [App\Http\Controllers\Admin\ShipmentController::class, 'get_remarks'])->name('admin.shipment.get_remarks');
        Route::post('/shipment/get_images', [App\Http\Controllers\Admin\ShipmentController::class, 'get_images'])->name('admin.shipment.get_images');
        Route::delete('/shipment/delete/{id}', [App\Http\Controllers\Admin\ShipmentController::class, 'images_destroy'])->name('admin.shipment.images_delete');

        //

        // Shipment Files Routes On Admin
        Route::post('/shipment_files/shipment_files_save', [App\Http\Controllers\Admin\ShipmentFileController::class, 'shipment_files_save'])->name('admin.shipment_files.shipment_files_save');
        //

        // Dispatch Routes On User
        Route::get('/dispatch/delivery_jobs', [App\Http\Controllers\Admin\DispatchController::class, 'delivery_jobs'])->name('admin.dispatch.delivery_jobs');
        Route::get('/dispatch/inscan', [App\Http\Controllers\Admin\DispatchController::class, 'inscan'])->name('admin.dispatch.inscan');
        Route::get('/dispatch/outscan', [App\Http\Controllers\Admin\DispatchController::class, 'outscan'])->name('admin.dispatch.outscan');
        Route::get('/shipment/pickup_req', [App\Http\Controllers\Admin\DispatchController::class, 'shipment_pickup'])->name('admin.dispatch.pickup_req');
        Route::get('/shipperaccount/shippermanifest', [App\Http\Controllers\Admin\DispatchController::class, 'manifest'])->name('admin.dispatch.manifest');
        Route::get('/distribution/collectionpendings', [App\Http\Controllers\Admin\DispatchController::class, 'pendings'])->name('admin.dispatch.pendings');
        Route::get('/distribution/collectionjobs', [App\Http\Controllers\Admin\DispatchController::class, 'collection_jobs'])->name('admin.dispatch.collection_jobs');
        Route::get('/driver/alldriverslocation', [App\Http\Controllers\Admin\DispatchController::class, 'driver_location'])->name('admin.dispatch.driver_location');
        //

        // Distribution Routes On User
        Route::get('/distribution/zone', [App\Http\Controllers\Admin\DistributionController::class, 'zone'])->name('admin.distribution.zone');
        Route::post('/distribution/zone_save', [App\Http\Controllers\Admin\DistributionController::class, 'zone_save'])->name('admin.shipment.zone_save');
        Route::post('/distribution/zone_area_save', [App\Http\Controllers\Admin\DistributionController::class, 'zone_area_save'])->name('admin.shipment.zone_area_save');
        Route::post('/distribution/zone_area_update', [App\Http\Controllers\Admin\DistributionController::class, 'zone_area_update'])->name('admin.shipment.zone_area_update');
        //

    });
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\User\ThemeController::class, 'index_page'])->name('index');
    Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');


    // Shipment Routes On User
    Route::get('/user/place_order', [App\Http\Controllers\User\ShipmentController::class, 'place_order_page'])->name('user.shipment.place_order');
    Route::post('/user/getcity', [App\Http\Controllers\Admin\ShipmentController::class, 'getcity'])->name('user.shipment.getcity');
    Route::post('/user/getarea', [App\Http\Controllers\Admin\ShipmentController::class, 'getarea'])->name('user.shipment.getarea');
    Route::post('/user/shipment/save', [App\Http\Controllers\User\ShipmentController::class, 'save'])->name('user.shipment.save');
    Route::get('/user/edit_order', [App\Http\Controllers\User\ShipmentController::class, 'edit_order_page'])->name('user.shipment.edit_order');
    Route::get('/user/upload_orders', [App\Http\Controllers\User\ShipmentController::class, 'upload_orders_page'])->name('user.shipment.upload_orders');
    Route::get('/user/shipments', [App\Http\Controllers\User\ShipmentController::class, 'shipments_page'])->name('user.shipment.shipments');
    Route::get('/user/manifests', [App\Http\Controllers\User\ShipmentController::class, 'manifests_page'])->name('user.shipment.manifests');
    Route::get('/user/invoices', [App\Http\Controllers\User\ShipmentController::class, 'invoices_page'])->name('user.shipment.invoices');
    Route::get('/user/address_book', [App\Http\Controllers\User\ShipmentController::class, 'address_book_page'])->name('user.shipment.address_book');
    Route::get('/user/manage_profile', [App\Http\Controllers\User\ShipmentController::class, 'manage_profile_page'])->name('user.shipment.manage_profile');
    Route::get('/user/update_password', [App\Http\Controllers\User\ShipmentController::class, 'update_password_page'])->name('user.shipment.update_password');

    //
});
