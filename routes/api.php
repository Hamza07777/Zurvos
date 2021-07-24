<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['apiHead']], function () {
    Route::post('user-register', 'apicontrollers\RegisterController@register');
    Route::post('send-verification-code', 'apicontrollers\RegisterController@sendcode');
    Route::post('confirm-verification-code', 'apicontrollers\RegisterController@confirm');
    Route::group([
        'prefix' => 'auth'

    ], function ($router) {

        Route::post('login', 'AuthController@login')->name('api.login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('update-password', 'apicontrollers\RegisterController@updatepassword');
        Route::post('update-profile', 'apicontrollers\RegisterController@updateprofile');
    });
    Route::group([
        'prefix' => 'users-post'
    ], function ($router) {
        Route::resource('post', 'apicontrollers\PostResourceController');
    });

    Route::group([
        'prefix' => 'users-follow'
    ], function ($router) {
        Route::resource('follow', 'apicontrollers\FollowController');
        Route::get('all-followers', 'apicontrollers\FollowController@allFollowers');
        Route::get('all-followings', 'apicontrollers\FollowController@allFollowings');
    });

    Route::group([
        'prefix' => 'users-workout'
    ], function ($router) {
        Route::resource('workout', 'apicontrollers\WorkoutController');
        Route::post('add-video', 'apicontrollers\WorkoutController@add_video')->name("add_video");
        Route::get('workout-details', 'apicontrollers\WorkoutController@getWorkoutDetails');
        Route::post('create-workout-list','apicontrollers\WorkoutController@createlist');
 

    });

    Route::group([
        'prefix' => 'buddy-workout'
    ], function ($router) {
        Route::resource('buddy_workout', 'apicontrollers\BuddyWorkoutResourceController');
        Route::get('invitations/{id}', 'apicontrollers\BuddyWorkoutResourceController@invitations');
        Route::post('changeInvitationStatus', 'apicontrollers\BuddyWorkoutResourceController@changeInvitationStatus');
        Route::get('/get-user-buddies/{id}' , 'apicontrollers\BuddyWorkoutResourceController@getBuddies');
    });

    Route::group([
        'prefix' => 'users-exercise-library'
    ], function ($router) {
        Route::resource('exercise-library', 'apicontrollers\ExerciseLibrarayController');
    });

    Route::group([
        'prefix' => 'products'
    ], function ($router) {
        Route::resource('product', 'apicontrollers\ProductController');
        Route::get('zavour_store','apicontrollers\ProductController@zavour_store');
    });

    Route::group([
        'prefix' => 'product-order'
    ], function ($router) {
        Route::resource('product', 'apicontrollers\ProductOrderController');
    });

    Route::group([
        'prefix' => 'video-order'
    ], function ($router) {
        Route::resource('video', 'apicontrollers\VideoOrderController');
    });
  Route::group([
        'prefix' => 'gym'
    ], function ($router) {
        Route::get('allgyms','apicontrollers\GymsController@allgyms');
    });
    Route::get('comments/show/{id}','apicontrollers\CommentsController@show_comment');
    Route::post('comments/store','apicontrollers\CommentsController@store');
    
    
      Route::post('post/share','apicontrollers\SharesController@share');
      
          Route::post('post/actions','apicontrollers\ActionController@action');
     Route::post("my_subscriptions","apicontrollers\StripePaymentController@my_subscription");
    Route::post("all_sessions", "apicontrollers\StripePaymentController@all_sessions");
    Route::post("all_transactions", "apicontrollers\StripePaymentController@all_transactions");
    Route::POST('add_payment_method', 'apicontrollers\StripePaymentController@add_payment_method');
    Route::post('report-bugs','apicontrollers\BugsController@bugs');
    Route::post('my_orders_list','apicontrollers\ProductOrderController@V_proallorder');
    
    

    Route::get('about','apicontrollers\AboutController@about');
    Route::post('contact-us','apicontrollers\ContactusController@sendinfo');
    Route::post('add-feedback','apicontrollers\FeedbackController@Addfeedback');

    // Users Feedback
    Route::get('users-feedback','apicontrollers\FeedbackController@usersFeedback');

    // Delete Feedback
    Route::post('delete-feedback','apicontrollers\FeedbackController@delFeedback');
 //   Route::apiresource('','apicontrollers\FaqquestionsController');
    Route::post('faq','apicontrollers\FaqquestionsController@store');
    // Faq questions update
    Route::post('faq-update','apicontrollers\FaqquestionsController@updaterecord');

    // Faq questions delete



    Route::post('user-profile','apicontrollers\CustomersController@userprofile')->name('userprofile');
//done

    Route::post('/workout-buddy-list', 'apicontrollers\AboutController@getWorkoutDetails');

//continue

    Route::post('/exercise-library' , 'apicontrollers\AboutController@getExerciseLibrary');
    Route::get('influenceAffaliated_policy','apicontrollers\InfluenceController@influenceAffaliated_policy');
    Route::get('influenceGeneratelink','apicontrollers\InfluenceController@influenceGeneratelink');
    Route::get('influenceResources','apicontrollers\InfluenceController@influenceResources');
    
       Route::post('/influence-user-statistics' , 'apicontrollers\InfluenceController@getInfluenceUsers');
          Route::post('/user_search' , 'apicontrollers\InfluenceController@user_search');
         Route::get('/user_notification/{id}' , 'apicontrollers\InfluenceController@user_notification');
       
    Route::get('userprofiles/{id}','apicontrollers\CustomersController@userprofilee');
    
     //free video

    Route::get('free-video','apicontrollers\PostResourceController@freevideo');

    //Paid Videos

    Route::get('paid-video','apicontrollers\PostResourceController@paidvideo');
    
    
    Route::get('workout_buddy','apicontrollers\PostResourceController@workout_buddy');
    
        Route::post('point2point_distance','apicontrollers\InfluenceController@point2point_distance');
    
        Route::get('user-workout-list/{id}','apicontrollers\InfluenceController@getUserWorkoutList');
        
    Route::post('workoutbuddy_find','apicontrollers\InfluenceController@workoutbuddy_find');
    
        Route::post('accept-workout-buddy','apicontrollers\InfluenceController@accept')->name('accept-buddy-workout');

    Route::post('reject-workout-buddy','apicontrollers\InfluenceController@reject')->name('reject-buddy-workout');

    Route::get('getallvideo/{id}','apicontrollers\InfluenceController@getallvideo');
    Route::post('addvideo','apicontrollers\InfluenceController@addvideo');
        

});

