<?php

use App\Http\Controllers\AdminController\AdCategoryController;
use App\Http\Controllers\AdminController\AdHomeController;
use App\Http\Controllers\AdminController\animaController;
use App\Http\Controllers\AdminController\AnimationController as AdminControllerAnimationController;
use App\Http\Controllers\AdminController\BackgroundController;
use App\Http\Controllers\AdminController\DelayController;
use App\Http\Controllers\AdminController\HorizontalmenuController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AnimationController;
use App\Http\Controllers\ChangeSttController;
use App\Http\Controllers\WebsiteController\HomeController;
use App\Models\Animation;
use App\Models\Horizontalmenu;
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
// Website
Route::get('/',[HomeController::class, 'Home'])->name('Home');
// Admin
Route::get('/admin',[AdHomeController::class,'HomeAdmin'])->name('HomeAdmin');
//@ParentCategory
Route::get('/Admin/ListParentCategory', [AdCategoryController::class,'ListParentCategory'])->name('ParentCategory');
Route::get('/Admin/PageAddParentCategory',[AdCategoryController::class,'PageAddParentCategory'])->name('PageAddParentCategory');
Route::post('/Admin/AddParent',[AdCategoryController::class,'Addparent'])->name('Addparent');
Route::delete('/Admin/Delete_parent/{id}',[AdCategoryController::class,'delete_parent'])->name('delete_parent');
Route::get('/Admin/Edit_parent/{id}',[AdCategoryController::class,'edit_parent'])->name('edit_parent');
Route::put('/Admin/Update_parent/{id}',[AdCategoryController::class,'update_parent'])->name('update_parent');
//@SubCategory
Route::get('/Admin/ListSubCategory',[AdCategoryController::class,'list_sub_category'])->name('SubCategory');
Route::get('/Admin/PageAddSubtCategory',[AdCategoryController::class,'PageAddSubCategory'])->name('PageAddSubCategory');
Route::post('/Admin/AddSub',[AdCategoryController::class,'add_sub'])->name('add_sub');
Route::delete('/Admin/delete_sub/{id}',[AdCategoryController::class,'delete_sub'])->name('delete_sub');
Route::get('/Admin/edit_sub/{id}',[AdCategoryController::class,'edit_sub'])->name('edit_sub');
Route::put('/Admin/update_sub/{id}',[AdCategoryController::class,'update_sub'])->name('update_sub');
//@Background
Route::get('Admin/background',[BackgroundController::class,'background']) ->name('background');
Route::get('Admin/addbackground',[BackgroundController::class,'addbackground'])->name('addbackground');
Route::post('/Admin/submit-background',[BackgroundController::class,'submit_bg'])->name('submit_bg');
Route::delete('/Admin/delete_bg/{id}',[BackgroundController::class,'delete_bg'])->name('delete_bg');
Route::get('/Admin/edit_bg/{id}',[BackgroundController::class,'edit_bg'])->name('edit_bg');
Route::put('/Admin/update_bg/{id}',[BackgroundController::class,'update_bg'])->name('update_bg');
//@Horizontal
Route::get('Admin/Horizontal',[HorizontalmenuController::class,'ListHorizontal']) ->name('ListHorizontal');
Route::get('Admin/PageCreateHorizontal',[HorizontalmenuController::class,'PageCreateHorizontal'])->name('PageCreateHorizontal');
Route::post('/Admin/addhorizontalmenu',[HorizontalmenuController::class,'addhorizontalmenu'])->name('addhorizontalmenu');
Route::delete('/Admin/delete_horizontal/{id}',[HorizontalmenuController::class,'delete_horizontal'])->name('delete_horizontal');
Route::get('/Admin/edit_horizontal/{id}',[HorizontalmenuController::class,'edit_horizontal'])->name('edit_horizontal');
Route::put('/Admin/update_horizontal_menu/{id}',[HorizontalmenuController::class,'update_horizontal_menu'])->name('update_horizontal_menu');
//@Product
Route::get('Admin/ListProduct',[ProductController::class,'ListProduct']) ->name('ListProduct');
Route::get('Admin/PageAddProduct',[ProductController::class,'PageAddProduct'])->name('PageAddProduct');
Route::post('/Admin/addproduct',[ProductController::class,'addproduct'])->name('addproduct');
Route::delete('/Admin/delete_product/{id}',[ProductController::class,'delete_product'])->name('delete_product');
Route::get('/Admin/edit_product/{id}',[ProductController::class,'edit_product'])->name('edit_product');
Route::put('/Admin/update_product/{id}',[ProductController::class,'update_product'])->name('update_product');

//@test change status
Route::get('/test',[ChangeSttController::class,'changeStatus']) ->name('changeStatus');
Route::get('/ChangeStatusProduct',[ChangeSttController::class,'ChangeStatusProduct']) ->name('ChangeStatusProduct');
Route::get('/ChangeSttBanner',[ChangeSttController::class,'ChangeSttBanner']) ->name('ChangeSttBanner');
Route::get('/ChangeSttDelay',[ChangeSttController::class,'ChangeSttDelay']) ->name('ChangeSttDelay');
Route::get('/ChangeSttAnimation',[ChangeSttController::class,'ChangeSttAnimation']) ->name('ChangeSttAnimation');


//@animation
Route::get('Admin/Animation',[animaController::class,'Listanimation']) ->name('animation');
Route::get('Admin/PageAddAnimation',[animaController::class,'PageAddAnimation']) ->name('PageAddAnimation');
Route::post('Admin/AddAnimation',[animaController::class,'AddAnimation'])->name('AddAnimation');
Route::delete('/Admin/deleteAnimation/{id}',[animaController::class,'DeleteAnimation'])->name('delete_animation');
Route::get('Admin/edit_animation/{id}',[animaController::class,'EditAnimation'])->name('edit_animation');
Route::put('Admin/update_animation/{id}',[animaController::class,'UpdateAnimation'])->name('Update_Animation');
//@delay
Route::get('Admin/Listdelay',[DelayController::class,'ListDelay']) ->name('ListDelay');
Route::get('Admin/PageDelayAdd',[DelayController::class,'PageDelayAdd']) ->name('PageDelayAdd');
Route::post('Admin/AddDelay',[DelayController::class,'AddDelay'])->name('AddDelay');
Route::delete('Admin/delete_delay/{id}',[DelayController::class,'delete_delay']) ->name('delete_delay');
Route::get('Admin/edit_delay/{id}',[DelayController::class,'edit_delay']) ->name('edit_delay');
Route::put('Admin/update_delay/{id}',[DelayController::class,'update_delay'])->name('update_delay');







    