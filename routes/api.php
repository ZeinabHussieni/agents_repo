<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\AgentController;

 Route::get("/agents", [AgentController::class, "getAll"]);