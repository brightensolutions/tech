<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/it-recruitment', function () {
    return view('it-recruitment');
});

Route::group(['prefix' => '/super-admin'], function () {
    // Admin login routes
    Route::get('login', [Admin_Controller::class, 'login']);
    Route::post('login', [Admin_Controller::class, 'checklogin']);

    // Other admin routes
    // Route::get('dashboard', [AdminAuth::class, 'showdashboard']);
    Route::get('home', [Admin_Controller::class, 'home']);
    // Route::post('update-home-title', [Admin_Controller::class, 'updatehometitle'])->name('title');

    Route::post('update-slider-image1', [Admin_Controller::class, 'updatesliderimage1'])->name('slider_image1');
    Route::post('update-slider-image2', [Admin_Controller::class, 'updatesliderimage2'])->name('slider_image2');
    Route::post('update-slider-image3', [Admin_Controller::class, 'updatesliderimage3'])->name('slider_image3');
    Route::post('update-home-image1', [Admin_Controller::class, 'updatehomeimage1'])->name('home_image1');
    Route::post('update-home-image2', [Admin_Controller::class, 'updatehomeimage2'])->name('home_image2');
    Route::post('update-home-image3', [Admin_Controller::class, 'updatehomeimage3'])->name('home_image3');
    Route::post('update-home-image1', [Admin_Controller::class, 'updateaboutimage1'])->name('about_image1');
    Route::post('update-home-image2', [Admin_Controller::class, 'updateaboutimage2'])->name('about_image2');
    Route::post('update-home-image3', [Admin_Controller::class, 'updateaboutimage3'])->name('about_image3');
    Route::post('update-home-content', [Admin_Controller::class, 'updateaboutcontent'])->name('about_content');
    Route::post('update-number-form', [Admin_Controller::class, 'updatenumberform'])->name('numbersform');

    Route::get('home-product', [Admin_Controller::class, 'homeproducts']);
    Route::get('add-home-product', [Admin_Controller::class, 'addhomeproduct']);
    Route::post('added-home-product', [Admin_Controller::class, 'addedhomeproduct'])->name('addedhomeproduct');
    Route::get('delete-home-product/{id}', [Admin_Controller::class, 'deletehomeproduct']);

    Route::get('testimonial', [Admin_Controller::class, 'testimonial']);
    Route::get('delete-testimonial/{id}', [Admin_Controller::class, 'deletetestimonial']);
    Route::post('update-testimonial', [Admin_Controller::class, 'updatetestimonial'])->name('updatetestimonial');
    Route::get('add-testimonial', [Admin_Controller::class, 'addtestimonial']);
    Route::post('added-testimonial', [Admin_Controller::class, 'addedtestimonial'])->name('addedtestimonial');

    Route::get('about', [Admin_Controller::class, 'about']);
    Route::post('update-about-video', [Admin_Controller::class, 'updateaboutvideo'])->name('aboutvideo');
    Route::post('update-about-content', [Admin_Controller::class, 'updatecompany'])->name('company');
    Route::post('update-about-image', [Admin_Controller::class, 'updateimage1'])->name('aboutimage');
    Route::post('update-about-content2', [Admin_Controller::class, 'updatewhychoose'])->name('whychoose');
    Route::post('update-about-image2', [Admin_Controller::class, 'updateimage2'])->name('aboutimage2');
    Route::post('update-about-image3', [Admin_Controller::class, 'updateimage3'])->name('aboutimage3');
    Route::post('update-about-image4', [Admin_Controller::class, 'updateimage4'])->name('aboutimage4');

    Route::get('certificate', [Admin_Controller::class, 'certificate']);
    Route::get('delete-certificate/{id}', [Admin_Controller::class, 'deletecertificate']);
    Route::get('add-certificate', [Admin_Controller::class, 'addcertificate']);
    Route::post('added-certificate', [Admin_Controller::class, 'addedcertificate'])->name('addedcertificate');

    Route::get('contact', [Admin_Controller::class, 'contact']);
    Route::post('update-address', [Admin_Controller::class, 'updateaddress'])->name('address');
    Route::post('update-mobile', [Admin_Controller::class, 'updatemobile'])->name('mobile');
    Route::post('update-email', [Admin_Controller::class, 'updateemail'])->name('email');

    //contactrequest
    Route::get('contactrequest', [Admin_Controller::class, 'contactrequest']);
    Route::get('delete-contactrequest/{id}', [Admin_Controller::class, 'deletecontactrequest']);

    // Route::post('update-about-title', [Admin_Controller::class, 'updateabouttitle'])->name('abouttitle');
    // Route::post('update-about-content', [Admin_Controller::class, 'updateaboutcontent'])->name('aboutcontent');

    // Route::post('update-about-image2', [Admin_Controller::class, 'updateaboutimage2'])->name('aboutimage2');
    // Route::post('update-director-image1', [Admin_Controller::class, 'updatedirectorimage1'])->name('directorimage1');
    // Route::post('update-director-image2', [Admin_Controller::class, 'updatedirectorimage2'])->name('directorimage2');
    // Route::post('update-believe', [Admin_Controller::class, 'updatedbelieve'])->name('believe');
    // Route::post('update-counters', [Admin_Controller::class, 'updatedcounters'])->name('counters');
    // Route::post('update-section-image1', [Admin_Controller::class, 'updatedsectionimage1'])->name('sectionimage1');
    // Route::post('update-section-content1', [Admin_Controller::class, 'updatedsectioncontent1'])->name('sectioncontent1');
    // Route::post('update-section-content2', [Admin_Controller::class, 'updatedsectioncontent2'])->name('sectioncontent2');
    // Route::post('update-section-image2', [Admin_Controller::class, 'updatedsectionimage2'])->name('sectionimage2');

    Route::get('logout', [Admin_Controller::class, 'adminlogout']);

    //products

    Route::get('category', [Admin_Controller::class, 'category']);
    Route::get('add-category', [Admin_Controller::class, 'addcategory']);
    Route::post('added-category', [Admin_Controller::class, 'addedcategory'])->name('addedcategory');
    Route::get('delete-category/{id}', [Admin_Controller::class, 'deletecategory']);
    Route::get('subcategory', [Admin_Controller::class, 'subcategory']);
    Route::get('add-subcategory', [Admin_Controller::class, 'addsubcategory']);
    Route::post('added-subcategory', [Admin_Controller::class, 'addedsubcategory'])->name('addedsubcategory');
    Route::get('delete-sub-category/{id}', [Admin_Controller::class, 'deletesubcategory']);
    Route::get('product', [Admin_Controller::class, 'product']);
    Route::get('add-product', [Admin_Controller::class, 'addproduct']);
    Route::get('fetch-subcategories', [Admin_Controller::class, 'fetchSubcategories']);
    Route::post('added-product', [Admin_Controller::class, 'addedproduct'])->name('addedproduct');
    Route::get('delete-product/{id}', [Admin_Controller::class, 'deleteproduct']);
});
