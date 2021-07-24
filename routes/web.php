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





     Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('customer.login');
     Route::post('/login', 'CustomerAuth\LoginController@login');
     Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('customer.logout');
    // Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('customer.register');

    // Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.request');
    // Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('customer.password.email');
    // Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('customer.password.reset');
    // Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');

    // Route::post('/register', 'CustomerController@register');

    Route::group(['middleware' => 'customer'], function (){
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/check_out_user', 'HomeController@check_out_user')->name('check_out_user');

        Route::get('/account_setting', 'HomeController@account_setting')->name('account_setting');
        Route::post('/account_setting_update_profile', 'HomeController@account_setting_update_profile')->name('account_setting_update_profile');


        Route::post('/check_in_user_month', 'HomeController@check_in_user_month')->name('check_in_user_month');
        Route::post('/check_in_user_week', 'HomeController@check_in_user_week')->name('check_in_user_week');
        Route::post('/check_in_user_year', 'HomeController@check_in_user_year')->name('check_in_user_year');


        Route::post('/check_out_user_month', 'HomeController@check_out_user_month')->name('check_out_user_month');
        Route::post('/check_out_user_week', 'HomeController@check_out_user_week')->name('check_out_user_week');
        Route::post('/check_out_user_year', 'HomeController@check_out_user_year')->name('check_out_user_year');






        ///////////////////////// User Checkin checkout //////////////////////////



        Route::get('/user_chk_in/{id}', 'HomeController@user_chk_in')->name('user_chk_in');


        Route::post('/user_chk_in_month', 'HomeController@user_chk_in_month')->name('user_chk_in_month');
        Route::post('/user_chk_in_week', 'HomeController@user_chk_in_week')->name('user_chk_in_week');
        Route::post('/user_chk_in_year', 'HomeController@user_chk_in_year')->name('user_chk_in_year');











        Route::get('/user_chk_out/{id}', 'HomeController@user_chk_out')->name('user_chk_out');
                Route::post('/user_chk_out_month', 'HomeController@user_chk_out_month')->name('user_chk_out_month');
        Route::post('/user_chk_out_week', 'HomeController@user_chk_out_week')->name('user_chk_out_week');
        Route::post('/user_chk_out_year', 'HomeController@user_chk_out_year')->name('user_chk_out_year');



        Route::get('/view_profile/{id}', 'HomeController@view_profile')->name('view_profile');


    });










    ////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
    //////////////////     Admin Views /////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////

    Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');


    Route::group(['middleware' => 'admin'], function (){
    Route::get('/dashboared', 'AdminController@index')->name('dashboared');
    Route::get('/admin_notification', 'AdminController@admin_notification')->name('admin_notification');

    Route::get('/invite_user', 'AdminController@invite_user')->name('invite_user');
    Route::post('/save_invite_user', 'AdminController@save_invite_user')->name('save_invite_user');

    Route::get('/admin_message', 'AdminController@admin_message')->name('admin_message');

    Route::get('/admin_add_gym', 'AdminController@admin_add_gym')->name('admin_add_gym');
    Route::post('/save_gym', 'AdminController@save_gym')->name('save_gym');

    Route::post('/gym_descriptions/{id}', 'AdminController@gym_descriptions')->name('gym_descriptions');
    Route::post('/gym_location/{id}', 'AdminController@gym_location')->name('gym_location');
    Route::get('/admin_order_list', 'AdminController@admin_order_list')->name('admin_order_list');
    Route::get('/admin_orders_detail/{id}', 'AdminController@admin_orders_detail')->name('admin_orders_detail');
    Route::get('/admin_new_user', 'AdminController@admin_new_user')->name('admin_new_user');
    Route::get('/admin_affiliated_partner', 'AdminController@admin_affiliated_partner')->name('admin_affiliated_partner');

    Route::get('/admin_new_partner', 'AdminController@admin_new_partner')->name('admin_new_partner');
    Route::post('/save_partner', 'AdminController@save_partner')->name('save_partner');


    Route::get('/admin_new_vendors', 'AdminController@admin_new_vendors')->name('admin_new_vendors');


    Route::get('/admin_new_tutorial', 'AdminController@admin_new_tutorial')->name('admin_new_tutorial');
    Route::post('/save_new_tutorial', 'AdminController@save_new_tutorial')->name('save_new_tutorial');


    Route::get('/admin_new_product', 'AdminController@admin_new_product')->name('admin_new_product');
    Route::post('/save_new_product', 'AdminController@save_new_product')->name('save_new_product');



    Route::get('/admin_excerise_library', 'AdminController@admin_excerise_library')->name('admin_excerise_library');
    Route::get('/admin_buddy_workout', 'AdminController@admin_buddy_workout')->name('admin_buddy_workout');

    Route::get('/admin_faqs', 'AdminController@admin_faqs')->name('admin_faqs');
    Route::post('/save_admin_faqs', 'AdminController@save_admin_faqs')->name('save_admin_faqs');

    Route::get('/admin_profile_update', 'AdminController@admin_profile_update')->name('admin_profile_update');
    Route::post('/admin_profile_update_save', 'AdminController@admin_profile_update_save')->name('admin_profile_update_save');

    Route::get('/admin_bug_reports', 'AdminController@admin_bug_reports')->name('admin_bug_reports');
    Route::get('/admin_delete_bug_reports/{id}', 'AdminController@admin_delete_bug_reports')->name('admin_delete_bug_reports');


    Route::get('/admin_vendor_faqs', 'AdminController@admin_vendor_faqs')->name('admin_vendor_faqs');
    Route::post('/save_vendor_faqs', 'AdminController@save_vendor_faqs')->name('save_vendor_faqs');

    Route::get('/admin_user_feedbacks', 'AdminController@admin_user_feedbacks')->name('admin_user_feedbacks');
    Route::get('/admin_delete_feedbacks/{id}', 'AdminController@admin_delete_feedbacks')->name('admin_delete_feedbacks');



    Route::get('/admin_vendor_profile', 'AdminController@admin_vendor_profile')->name('admin_vendor_profile');



    Route::get('/delete_faq/{id}', 'AdminController@delete_faq')->name('delete_faq');
    Route::get('/edit_faq/{id}', 'AdminController@edit_faq')->name('edit_faq');
    Route::post('/update_admin_faqs/{id}', 'AdminController@update_admin_faqs')->name('update_admin_faqs');

    
    Route::get('/view_user_profile/{id}', 'AdminController@view_profile')->name('view_user_profile');
        Route::get('/delete_user_profile/{id}', 'AdminController@delete_user_profile')->name('delete_user_profile');
    Route::get('/user_chk_out/{id}', 'AdminController@check_out_user')->name('user_chk_out');
    
    
    Route::get('/user_chk_in/{id}', 'AdminController@user_chk_in')->name('user_chk_in');
});










Route::group(['prefix' => 'influence'], function () {
    Route::get('/login', 'InfluenceAuth\LoginController@showLoginForm')->name('influence.login');
    Route::post('/login', 'InfluenceAuth\LoginController@login');
    Route::post('/logout', 'InfluenceAuth\LoginController@logout')->name('influence.logout');

    Route::get('/register', 'InfluenceAuth\RegisterController@showRegistrationForm')->name('influence.register');
    Route::post('/register', 'InfluenceeController@store');
    Route::post('/address_detail','InfluenceeController@address_detail')->name('influence.address_detail');
  //   Route::post('/social_media_links','InfluenceeController@social_media_links')->name('influence.social_media_links');
    Route::post('/proof_of_identity','InfluenceeController@proof_of_identity')->name('influence.proof_of_identity');
    Route::get('/address_detail_view_call', 'InfluenceeController@address_detail_view_call')->name('influence.address_detail_view_call');
    Route::get('/proof_of_identity_view_call', 'InfluenceeController@proof_of_identity_view_call')->name('influence.proof_of_identity_view_call');
    Route::post('/proof_of_identity_save','InfluenceeController@proof_of_identity_save')->name('influence.proof_of_identity_save');

    Route::post('/password/email', 'InfluenceAuth\ForgotPasswordController@sendResetLinkEmail')->name('influence.password.request');
    Route::post('/password/reset', 'InfluenceAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'InfluenceAuth\ForgotPasswordController@showLinkRequestForm')->name('influence.password.reset');
    Route::get('/password/reset/{token}','InfluenceAuth\ResetPasswordController@showResetForm');

      Route::group(['middleware' => 'influence'], function (){

    Route::post('/post', 'InfluenceeController@save_post')->name('influence.postss');
    Route::post('/fallllow', 'InfluenceeController@postfollow')->name('influence.fallllow');

    Route::get('/influence_home','InfluenceeController@index')->name('influence_home');
    Route::get('/search_page','InfluenceeController@search_page')->name('search_page');
    Route::post('/search_page','InfluenceeController@search_page_result')->name('search_page');
    Route::get('/notification_page','InfluenceeController@notification_page')->name('notification_page');
     Route::get('/notification_page_today','InfluenceeController@notification_page_today')->name('notification_page_today');
     Route::get('/notification_page_yesterday','InfluenceeController@notification_page_yesterday')->name('notification_page_yesterday');

    Route::get('/free_video_page','InfluenceeController@free_video_page')->name('free_video_page');
    Route::get('/paid_video_page','InfluenceeController@paid_video_page')->name('paid_video_page');
    Route::get('/search_video_page_load','InfluenceeController@search_video_page_load')->name('search_video_page_load');
    Route::post('/search_video_page','InfluenceeController@search_video_page')->name('search_video_page');
    Route::get('/fitness_produsts_page','InfluenceeController@fitness_produsts_page')->name('fitness_produsts_page');
    Route::get('/zavour_store','InfluenceeController@zavour_store')->name('zavour_store');
    Route::get('/my_affiliated','InfluenceeController@my_affiliated')->name('my_affiliated');
    Route::get('/my_earning','InfluenceeController@my_earning')->name('my_earning');
    Route::get('/transaction_sto','InfluenceeController@transaction_store')->name('transaction_sto');
    Route::get('/credit_store','InfluenceeController@credit_store')->name('credit_store');
    Route::get('/affaliated_policy','InfluenceeController@affaliated_policy')->name('affaliated_policy');
    Route::get('/account_setting','InfluenceeController@account_setting')->name('account_setting');
    Route::post('/account_setting_update_profile','InfluenceeController@account_setting_update_profile')->name('account_setting_update_profile');
    Route::post('/place_order','InfluenceeController@product_order')->name('place_order');


    Route::get('/my_profilee','InfluenceeController@my_profile')->name('my_profilee');
    Route::get('/posts_page','InfluenceeController@posts_page')->name('posts_page');
    Route::get('/followers_page','InfluenceeController@followers_page')->name('followers_page');
    Route::get('/following_page','InfluenceeController@following_page')->name('following_page');
    Route::get('/my_orders','InfluenceeController@my_orders')->name('my_orders');
    Route::get('/my_orders_detail/{id}','InfluenceeController@show')->name('my_orders_detail');
    Route::get('/all_sessions','InfluenceeController@all_sessions')->name('all_sessions');
    Route::get('/add_payment_method','InfluenceeController@add_payment_method')->name('add_payment_method');
    Route::post('/add_payment_method_store','InfluenceeController@add_payment_method_store')->name('add_payment_method_store');
    Route::get('/FAQ_question','InfluenceeController@FAQ_question')->name('FAQ_question');
    Route::get('/FAQ_video','InfluenceeController@FAQ_video')->name('FAQ_video');
    Route::get('/contact_zurvos','InfluenceeController@contact_zurvos')->name('contact_zurvos');
    Route::post('/contact_zurvos_store','InfluenceeController@contact_zurvos_store')->name('contact_zurvos_store');
    Route::get('/bug_report','InfluenceeController@bug_report')->name('bug_report');
    Route::post('/bug_report_store','InfluenceeController@bug_report_store')->name('bug_report_store');
    Route::get('/privacy_policy','InfluenceeController@privacy_policy')->name('privacy_policy');
    Route::get('/about_zurvos','InfluenceeController@about_zurvos')->name('about_zurvos');
  //   Route::get('additional_information','InfluenceeController@additional_information')->name('additional_information');

    Route::delete('/delete_order/{id}','InfluenceeController@destroy')->name('delete_order');
    Route::get('my_resources','InfluenceeController@my_resources')->name('my_resources');
    Route::get('my_resources_create','InfluenceeController@my_resources_create')->name('my_resources_create');
    Route::get('generate_affiliated_link','InfluenceeController@generate_affiliated_link')->name('generate_affiliated_link');
    Route::post('my_resources_store','InfluenceeController@my_resources_store')->name('my_resources_store');
    Route::delete('/my_resources_store/{id}','InfluenceeController@my_resources_delete')->name('my_resources_store');
    Route::post('/search_resource_page','InfluenceeController@search_resource_page')->name('search_resource_page');
    Route::post('/affiliated_link_save','InfluenceeController@affiliated_link_save')->name('affiliated_link_save');





    Route::get('workoutbuddy','InfluenceeController@workoutbuddy')->name('workoutbuddy_influ');
    Route::post('workoutbuddy_find','InfluenceeController@workoutbuddy_find')->name('workoutbuddy_find');
    Route::post('workoutbuddy_save','InfluenceeController@workoutbuddy_save')->name('workoutbuddy_save');




    Route::get('workoutlist','InfluenceeController@workoutlist')->name('workoutlist_influ');
    Route::get('message','InfluenceeController@message')->name('message');

    Route::get('invitation','InfluenceeController@invitation')->name('invitation');
    Route::post('accept_invite/{id}','InfluenceeController@accept_invite')->name('accept_invite');
    Route::post('reject_invite/{id}','InfluenceeController@reject_invite')->name('reject_invite');


    Route::get('feedback','InfluenceeController@feedback')->name('feedback');
    Route::post('feedback_storeee','InfluenceeController@feedback_storeee')->name('feedback_storeee');

    Route::get('buddylist','InfluenceeController@buddylist')->name('buddylist');



    Route::get('buildworkout','InfluenceeController@buildworkout')->name('buildworkout');
    Route::post('buildworkout_store','InfluenceeController@buildworkout_store')->name('buildworkout_store');

    Route::get('exercise','InfluenceeController@exercise')->name('exercise');
    Route::post('exercise_store','InfluenceeController@exercise_store')->name('exercise_store');
    Route::get('workout_videos/{id}','InfluenceeController@workout_exercise_video')->name('workout_videos');

    Route::post('order_workout_vedio','InfluenceeController@order_workout_vedio')->name('order_workout_vedio');



    Route::post('save_likes','InfluenceeController@save_likes')->name('save_likes');
    Route::post('save_comments','InfluenceeController@save_comments')->name('save_comments');
    Route::post('save_shares','InfluenceeController@save_shares')->name('save_shares');


    Route::delete('/unfolloww/{id}','InfluenceeController@unfolloww')->name('unfolloww');
    Route::post('/followw/{id}','InfluenceeController@followw')->name('followw');

     Route::get('verify_link_form','InfluenceeController@verify_link_form')->name('verify_link_form');
    Route::post('verify_link_form_verify','InfluenceeController@verify_link_form_verify')->name('verify_link_form_verify');
  });


  
Route::group(['namespace'=>'Customer','prefix'=>'customer'],function(){

    Route::resource('posts','PostController');
    Route::get('customer-all-allgym','GymController@index')->name('customer.all.allgym');
    Route::get('user-transaction','TransactionController@index')->name('user-transaction');
    Route::get('customer-product','ProductController@index')->name('customer-product');
    Route::get('policy','PolicyController@index')->name('policy');
    
    });
  });


Route::group(['prefix' => 'vendor'], function () {
    Route::get('/login', 'VendorAuth\LoginController@showLoginForm')->name('vendor.login');
    Route::post('/login', 'VendorAuth\LoginController@login');
    Route::post('/logout', 'VendorAuth\LoginController@logout')->name('vendor.logout');

    Route::get('/register', 'VendorAuth\RegisterController@showRegistrationForm')->name('vendor.register');
    Route::post('/register', 'VendorController@store');

    Route::post('/address_detail','VendorController@address_detail')->name('vendor.address_detail');
     Route::post('/proof_of_identity_save','VendorController@proof_of_identity_save')->name('vendor.proof_of_identity_save');

     Route::group(['middleware' => 'vendor'], function (){
        Route::get('/my_store', 'VendorController@vendor_store')->name('my_store');
        Route::get('/vendor_policy', 'VendorController@vendor_policy')->name('vendor_policy');
        Route::get('/new_product_vendor', 'VendorController@admin_new_product')->name('new_product_vendor');
        Route::post('/save_new_product_vendor', 'VendorController@save_new_product')->name('save_new_product_vendor');
        Route::get('/contact_zurvos_vendor','VendorController@contact_zurvos')->name('contact_zurvos_vendor');
        Route::post('/contact_zurvos_store_vendor','VendorController@contact_zurvos_store')->name('contact_zurvos_store_vendor');

        Route::get('feedback_vendor','VendorController@feedback')->name('feedback_vendor');
        Route::post('feedback_storeee_vendor','VendorController@feedback_storeee')->name('feedback_storeee_vendor');
        Route::get('/fitness_produsts_page','VendorController@fitness_produsts_page')->name('fitness_produsts_page');

        Route::get('/vendor_profile_update', 'VendorController@admin_profile_update')->name('vendor_profile_update');
        Route::post('/vendor_profile_update_save', 'VendorController@admin_profile_update_save')->name('vendor_profile_update_save');

        Route::get('/order_list', 'VendorController@order_list')->name('order_list');

        Route::get('/sales_list', 'VendorController@sales_list')->name('sales_list');

        Route::get('/vendor_faqs', 'VendorController@admin_vendor_faqs')->name('vendor_faqs');
        Route::post('/save_faqs', 'VendorController@save_vendor_faqs')->name('save_faqs');

        Route::get('/vendor_profile', 'VendorController@admin_vendor_profile')->name('vendor_profile');

         });
});


