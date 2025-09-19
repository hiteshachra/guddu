<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PoolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Employee
*/


    Auth::routes(['verify' => true]);

    Route::get('/', [FrontController::class, 'index']);
    Route::get('/privacy', [HomeController::class, 'static_content']);
    Route::get('/terms', [HomeController::class, 'static_content']);
    Route::get('/about-us', [HomeController::class, 'static_content']);
    // Route::get('/our-vision', [HomeController::class, 'static_content']);
    Route::get('/contact-us', [HomeController::class, 'contact_us']);
    Route::get('/faq', [HomeController::class, 'faq']);
    // Route::get('/partners', [HomeController::class, 'partners']);
    Route::post('/create-new-user', [HomeController::class, 'create_new_user']);
    Route::post('/vendor-register', [RegisterController::class, 'vendor_register']);


    // Route::get('bill/{order_code}',[HomeController::class, 'view_bill']);


Route::middleware(['roleAuth:User|Vendor', 'check.blocked'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/scanner', [HomeController::class, 'scanner'])->name('scanner');
    Route::get('/profile', [HomeController::class, 'my_account']);
    Route::get('/update-profile', [HomeController::class, 'edit_account']);
    Route::post('/update-profile', [HomeController::class, 'update_accounts']);
    Route::get('/update-kyc', [HomeController::class, 'edit_kyc']);
    Route::post('/update-kyc', [HomeController::class, 'update_kyc']);
    Route::get('/update-bank', [HomeController::class, 'edit_bank']);
    Route::post('/update-bank', [HomeController::class, 'update_bank']);
    Route::get('/update-shop', [HomeController::class, 'edit_shop']);
    Route::post('/update-shop', [HomeController::class, 'update_shop']);
    Route::get('/change-password', [HomeController::class, 'change_password']);
    Route::post('/change-password', [HomeController::class, 'change_passwords']);
    Route::get('/my-wallet', [HomeController::class, 'my_wallet']);
    Route::post('add-money-in-wallet', [HomeController::class, 'add_money_in_wallet']);

    Route::get('add-money', [HomeController::class, 'add_money']);
    Route::post('add-money', [HomeController::class, 'add_moneys']);
    Route::match(['get', 'post'], 'fund-request-list', [HomeController::class, 'fund_request_list']);

    Route::get('add-money-online', [HomeController::class, 'add_money_online']);

    Route::get('pool-info/{id}', [HomeController::class, 'pool_info']);
    Route::get('coin-transaction', [HomeController::class, 'coin_transaction']);
    Route::get('coin-transaction-verify', [HomeController::class, 'coin_transaction_verify']);
    Route::get('send-money', [HomeController::class, 'send_money']);
    Route::get('validate-send-money', [HomeController::class, 'validate_send_money']);
    Route::post('send-money', [HomeController::class, 'send_moneys']);
    Route::get('send-money/{status}/{id}', [HomeController::class, 'send_money_status']);
    Route::get('receive-money', [HomeController::class, 'receive_money']);
    Route::get('my-referrals', [HomeController::class, 'my_referrals']);
    Route::get('pool-ledger', [HomeController::class, 'pool_ledger']);

    Route::get('amount-to-points', [HomeController::class, 'amount_to_point']);
    Route::post('amount-to-points', [HomeController::class, 'amount_to_points']);
    Route::match(['get', 'post'], 'purchase-point-history', [HomeController::class, 'purchase_point_history']);

    Route::get('withdraw-request', [HomeController::class, 'withdraw_request']);
    Route::post('withdraw-request', [HomeController::class, 'withdraw_requests']);
    Route::match(['get', 'post'], 'withdraw-request-list', [HomeController::class, 'withdraw_request_list']);


  


    // Route::get('/coupons', [HomeController::class, 'coupons']);
    Route::get('/my-address', [HomeController::class, 'my_address']);
    Route::post('/add-address', [HomeController::class, 'add_address']);
    Route::post('/delete-address', [HomeController::class, 'delete_address']);
    Route::post('/set-user-default-address', [HomeController::class, 'set_user_default_address']);
    Route::get('/terms-condition', [HomeController::class, 'terms_condition']);
    Route::get('/help-support', [HomeController::class, 'help_support']);
    Route::get('/help-ticket', [HomeController::class, 'help_ticket']);

    Route::get('/support-create', [HomeController::class, 'support_create']);
    Route::post('/support-create', [HomeController::class, 'support_creates']);
    Route::get('/support-view/{id}', [HomeController::class, 'support_view']);
    Route::post('/support-reply/{id}', [HomeController::class, 'support_reply']);
    Route::match(['get', 'post'], '/support-list', [HomeController::class, 'support_list']);

});
    



Route::middleware(['roleAuth:Delivery Boy', 'check.blocked'])->group(function () {

    Route::get('employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');

});


Route::middleware(['roleAuth:Restaurant|Distributor', 'check.blocked'])->group(function () {

    Route::get('dashboard', [MemberController::class, 'index'])->name('dashboard');
});







Route::middleware(['roleAuth:Admin|Employee','check.blocked'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin//sell-dashboard', [AdminController::class, 'index_two'])->name('admin.sell-dashboard');

    Route::prefix('users')->group(function () {
    
        Route::match(['get', 'post'], '/user-list', [UserController::class, 'user_list']);
        Route::get('/user', [UserController::class, 'add_user']);
        Route::post('/user', [UserController::class, 'user_create']);
        Route::get('/user/{id}', [UserController::class, 'user_edit']);
        Route::post('/user/{id}', [UserController::class, 'user_update']);
        Route::get('/user-status-change/{id}', [UserController::class, 'user_status_change']);

        Route::match(['get', 'post'], '/direct-team-list', [UserController::class, 'direct_team_list']);
        Route::match(['get', 'post'], '/level-team-list', [UserController::class, 'level_team_list']);

        Route::match(['get', 'post'], '/available-balance-list', [UserController::class, 'available_balance_list']);
        Route::match(['get', 'post'], '/point-ledger-list', [UserController::class, 'point_ledger_list']);
        Route::match(['get', 'post'], '/main-ledger-list', [UserController::class, 'main_ledger_list']);

        Route::match(['get', 'post'], '/address-list', [UserController::class, 'address_list']);
        Route::get('/address-status-change/{id}', [UserController::class, 'address_status_change']);

        Route::get('/user-kyc-list', [UserController::class, 'kyc_list']);
        Route::post('/user-kyc-list', [UserController::class, 'kyc_list']);
        Route::post('/kyc-status-change', [UserController::class, 'kyc_status_change']);

        Route::get('/user-bank-list', [UserController::class, 'bank_detail_list']);
        Route::post('/user-bank-list', [UserController::class, 'bank_detail_list']);
        Route::post('/bank-detail-status-change', [UserController::class, 'bank_detail_status_change']);

        Route::get('/user-shop-list', [UserController::class, 'shop_detail_list']);
        Route::post('/user-shop-list', [UserController::class, 'shop_detail_list']);
    });



    Route::resource('pools', PoolController::class);
    Route::prefix('pool')->group(function () {
        // Route::match(['get', 'post'], '/pool-list', [PoolController::class, 'pool_list']);
        Route::match(['get', 'post'], '/user-pool-request-list', [PoolController::class, 'user_pool_request_list']);
        Route::match(['get', 'post'], '/pool-cashback-list', [PoolController::class, 'pool_cashback_list']);
        Route::get('chnage-status/{id}', [PoolController::class, 'status_change']);



        Route::prefix('commissions')->group(function () {
            Route::match(['get', 'post'], '/list', [PoolController::class, 'commission_list']);
        });


    });

    Route::prefix('tariffs')->group(function () {
        Route::match(['get', 'post'], '/list', [UserController::class, 'tariff_list']);
        Route::get('/add', [UserController::class, 'add_tariff']);
        Route::post('/create', [UserController::class, 'create_tariff']);
        Route::get('/edit/{id}', [UserController::class, 'edit_tariff']);
        Route::post('/update/{id}', [UserController::class, 'update_tariff']);
        Route::get('/delete/{id}', [UserController::class, 'delete_tariff']);
    });



    Route::prefix('fund')->group(function () {
        Route::get('/transfer', [AdminController::class, 'fund_transfer']);
        Route::post('/transfer', [AdminController::class, 'fund_transfers']);
        Route::match(['get', 'post'], '/transfer-list', [AdminController::class, 'fund_transfer_list']);
        Route::match(['get', 'post'], '/request-list', [AdminController::class, 'fund_request_list']);
        Route::get('/request-update/{status}/{id}', [AdminController::class, 'fund_request_update']);
    });


    Route::prefix('support')->group(function () {
        Route::get('/reply/{code}', [AdminController::class, 'support_reply']);
        Route::post('/reply/{id}', [AdminController::class, 'support_replys']);
        Route::get('/close/{code}', [AdminController::class, 'support_close']);
        Route::match(['get', 'post'], '/support-list/{status}', [AdminController::class, 'support_list']);
    });


    Route::prefix('withdraw')->group(function () {
        Route::get('/list/{status}', [AdminController::class, 'withdraw_list']);
        Route::post('/list/{status}', [AdminController::class, 'withdraw_list']);
        Route::get('/request-update/{status}/{id}', [AdminController::class, 'withdraw_request_update']);
    });






    


    Route::prefix('settings')->group(function () {
    
        Route::get('/banners', [SettingController::class, 'banners']);
        Route::get('/banner-list', [SettingController::class, 'banner_list']);
        Route::post('/banners', [SettingController::class, 'banners_create']);
        Route::get('/banners/{id}', [SettingController::class, 'banners_edit']);
        Route::post('/banners/{id}', [SettingController::class, 'banners_update']);
        Route::get('/banners-status-change/{id}', [SettingController::class, 'banners_status_change']);
        
        Route::get('/faq-list', [SettingController::class, 'faq_list']);
        Route::get('/faq', [SettingController::class, 'faq']);
        Route::post('/faq', [SettingController::class, 'faq_create']);
        Route::get('/faq/{id}', [SettingController::class, 'faq_edit']);
        Route::post('/faq/{id}', [SettingController::class, 'faq_update']);
        Route::get('/faq-status-change/{id}', [SettingController::class, 'faq_status_change']);

        Route::group(['prefix' => 'static-content', 'as' => 'static.'], function () {
            Route::get('/', [SettingController::class, 'static_list'])->name('list');
            Route::match(['get','post'],'/update/{id}', [SettingController::class, 'static_update'])->name('update');
        });

        Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
            Route::get('/', [SettingController::class, 'config_list'])->name('list');
            Route::post('config-update', [SettingController::class, 'config_update'])->name('update');
        });
    
    });

});




    Route::get('/get-state', [HomeController::class, 'get_state']);
    Route::get('/get-city', [HomeController::class, 'get_city']);
    Route::get('/find-user-name', [HomeController::class, 'find_user_name']);
    Route::get('/update-fcm-token', [HomeController::class, 'update_fcm_token']);


    Route::get('/cron-job-users-enter-and-win', [PoolController::class, 'enterUsersToPool']);
    Route::get('/cron-job-vendors-enter-and-win', [PoolController::class, 'enterVendorsToPool']);


