<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubmissionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');


Route::get('/login-form', [LoginController::class, 'loginForm'])->name('login.form');

Route::get('/scholar-form', [ScholarController::class, 'scholarForm'])->name('scholar.form');
Route::post('/scholars', [ScholarController::class, 'store'])->name('scholar.store');
Route::get('/scholars/{id}', [ScholarController::class, 'show'])->name('scholar.show');
Route::delete('/scholars/{id}', [ScholarController::class, 'destroy'])->name('scholars.destroy');
Route::patch('/scholars/{id}/status', [ScholarController::class, 'updateStatus'])->name('scholars.updateStatus');
Route::get('/scholars/approved', [ScholarController::class, 'approvedScholars'])->name('scholars.approved');
Route::get('/scholars/rejected', [ScholarController::class, 'rejectedScholars'])->name('scholars.rejected');



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/manage-scholars', [DashboardController::class, 'manageScholars'])->name('manageScholars');
Route::get('/dashboard/submissions', [DashboardController::class, 'submissions'])->name('submissions');
Route::get('/dashboard/approved-scholar', [DashboardController::class, 'approvedScholars'])->name('approvedScholars');
Route::get('/dashboard/rejected-scholar', [DashboardController::class, 'rejectedScholars'])->name('rejectedScholars');




Route::post('/submissions/store/{scholar}', [SubmissionController::class, 'storeSubmission'])->name('submissions.store');
