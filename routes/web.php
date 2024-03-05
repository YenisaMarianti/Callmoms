<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialServices\MeditationController;
use App\Http\Controllers\SpecialServices\OnlineConsultationController;
use App\Http\Controllers\TesKondisiPerasaanController;
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

Route::get('/sign-in', [LoginController::class, 'showLogin'])->name('users.login')->middleware('guest');
Route::get('/sign-up', [RegisterController::class, 'showRegister'])->middleware('guest');

// Create New User Data
Route::post('/create-user', [RegisterController::class, 'storeUserData'])->name('users.store');

// Login User
Route::post('/login', [LoginController::class, 'login'])->name('users.process-login');

// Logout User
Route::post('/logout', [LoginController::class, 'logout']);

// Middleware Authentication
Route::middleware(['authentication'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'showDashboard']);

    // Meditation
    Route::get('/meditation', [MeditationController::class, 'showMeditation'])->middleware('role:ibu,keluarga');

    // Online Consultation
    Route::get('/online-consultation', [OnlineConsultationController::class, 'showOnlineConsultation'])->middleware('role:ibu,keluarga');

    // Private Message
    Route::get('/chat/doctor/{id}', [OnlineConsultationController::class, 'showDialogPrivateMessage'])->middleware('role:ibu,keluarga');
    Route::get('/chat/user/{id}', [OnlineConsultationController::class, 'showDialogPrivateMessageUser'])->middleware('role:dokter');
    Route::get('/messages/{recipientId}', [OnlineConsultationController::class, 'getMessages']);
    Route::post('/send', [OnlineConsultationController::class, 'sendMessage']);

    // Message from Mom or Family
    Route::get('/show-messages', [OnlineConsultationController::class, 'showAllUsersWithLastMessage'])->middleware('role:dokter');

    // Discussion Forum
    Route::get('/discussion-forum', [OnlineConsultationController::class, 'showForumDiscussion']);
    Route::get('/messages-forum', [OnlineConsultationController::class, 'getMessagesForum']);
    Route::post('/send-discussion', [OnlineConsultationController::class, 'sendMessageDiscussion']);

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'showProfile']);
    Route::post('/profile-update/{id}', [ProfileController::class, 'updateProfile'])->name('users.update');

    // Tes kondisi perasaan
    Route::get('/emotional-condition', [TesKondisiPerasaanController::class, 'showTesKondisiPerasaan']);

});