<?php

use Simplysamin\LaravelPermissionEditor\Http\Controllers\RoleController;
use Simplysamin\LaravelPermissionEditor\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);