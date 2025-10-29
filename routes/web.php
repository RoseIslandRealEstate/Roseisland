<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\Admin as Admin;

Route::get('login',[Admin\HomeController::class,'login'])->name('login');
Route::post('login',[Admin\HomeController::class,'post_login']);

Route::get('logout',[Admin\HomeController::class,'logout']);


 
Route::group(['middleware'=>['web', 'multi_auth']],function(){
    
    Route::get('/',[Admin\HomeController::class,'index']);
    //agents
    Route::get('agents',[Admin\AgentController::class,'index']);
    Route::post('agents/add',[Admin\AgentController::class,'add']);
    Route::get('agents/edit/{id}',[Admin\AgentController::class,'edit']);
    Route::post('agents/edit/{id}',[Admin\AgentController::class,'post_edit']);
    Route::get('agents/delete/{id}',[Admin\AgentController::class,'delete']);

    //projects
    Route::get('projects',[Admin\ProjectController::class,'index']);
    Route::post('projects/add',[Admin\ProjectController::class,'add']);
    Route::get('projects/edit/{id}',[Admin\ProjectController::class,'edit']);
    Route::post('projects/edit/{id}',[Admin\ProjectController::class,'post_edit']);
    Route::get('projects/delete/{id}',[Admin\ProjectController::class,'delete']);

    //compaigns
    Route::get('compaigns',[Admin\CompaignController::class,'index']);
    Route::post('compaigns/add',[Admin\CompaignController::class,'add']);
    Route::get('compaigns/edit/{id}',[Admin\CompaignController::class,'edit']);
    Route::post('compaigns/edit/{id}',[Admin\CompaignController::class,'post_edit']);
    Route::get('compaigns/delete/{id}',[Admin\CompaignController::class,'delete']);

    
    //leads
    Route::get('leads',[Admin\LeadController::class,'index']);
    Route::post('leads/add',[Admin\LeadController::class,'add']);
    Route::get('leads/edit/{id}',[Admin\LeadController::class,'edit']);
    Route::post('leads/edit/{id}',[Admin\LeadController::class,'post_edit']);
    Route::get('leads/delete/{id}',[Admin\LeadController::class,'delete']);
    Route::get('leads/statuses/{id}',[Admin\LeadController::class,'lead_statuses']);
    Route::get('leads/update-status/{id}',[Admin\LeadController::class,'update_status']);
    Route::post('leads/update-status/{id}',[Admin\LeadController::class,'post_update_status']);
    
    // to do list 
    Route::get('to-do-lists',[Admin\ToDoListController::class,'index']);
    Route::post('to-do-lists/add-row',[Admin\ToDoListController::class,'add_row']);
    Route::post('to-do-lists/add',[Admin\ToDoListController::class,'add']);
    Route::post('to-do-lists/update-order',[Admin\ToDoListController::class,'update_order']);
    Route::get('to-do-lists/edit/{id}',[Admin\ToDoListController::class,'edit']);
    Route::post('to-do-lists/edit/{id}',[Admin\ToDoListController::class,'post_edit']);
    Route::post('to-do-lists/update-status/{id}',[Admin\ToDoListController::class,'update_status']);
    Route::get('to-do-lists/delete/{id}',[Admin\ToDoListController::class,'delete']);

    //notifications 
    Route::get('notes/view/{id}',[Admin\NotificationController::class,'note_view']);
});

