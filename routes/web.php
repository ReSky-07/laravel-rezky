<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\LandingPageController;


Route::get('/', function () {
    return view('landingpage');
});
Route::post('/contact', [AdminContactController::class, 'store'])->name('admin.contact.store');
Route::delete('/admin/contact/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User Route
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

// Admin Route
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    // dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // certificates
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index'])->name('certificates.index');
    // home
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home.index');
    Route::get('/admin/home/create', [AdminHomeController::class, 'create'])->name('admin.home.create');
    Route::post('/admin/home', [AdminHomeController::class, 'store'])->name('admin.home.store');
    Route::get('/admin/home/{home}/edit', [AdminHomeController::class, 'edit'])->name('admin.home.edit');
    Route::put('/admin/home/{home}', [AdminHomeController::class, 'update'])->name('admin.home.update');
    Route::delete('/admin/home/{home}', [AdminHomeController::class, 'destroy'])->name('admin.home.destroy');
    // about
    Route::get('/admin/about', [AdminAboutController::class, 'index'])->name('admin.about.index');
    Route::get('/admin/about/create', [AdminAboutController::class, 'create'])->name('admin.about.create');
    Route::post('/admin/about', [AdminAboutController::class, 'store'])->name('admin.about.store');
    Route::get('/admin/about/{about}/edit', [AdminAboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/admin/about/{about}', [AdminAboutController::class, 'update'])->name('admin.about.update');
    Route::delete('/admin/about/{about}', [AdminAboutController::class, 'destroy'])->name('admin.about.destroy');
    // skill
    Route::get('/admin/skill', [AdminSkillController::class, 'index'])->name('admin.skill.index');
    Route::get('/admin/skill/create', [AdminSkillController::class, 'create'])->name('admin.skill.create');
    Route::post('/admin/skill', [AdminSkillController::class, 'store'])->name('admin.skill.store');
    Route::get('/admin/skill/{skill}/edit', [AdminSkillController::class, 'edit'])->name('admin.skill.edit');
    Route::put('/admin/skill/{skill}', [AdminSkillController::class, 'update'])->name('admin.skill.update');
    Route::delete('/admin/skill/{skill}', [AdminSkillController::class, 'destroy'])->name('admin.skill.destroy');
    // certificate
    Route::get('/admin/certificates', [AdminCertificateController::class, 'index'])->name('admin.certificates.index');
    Route::get('/admin/certificates/create', [AdminCertificateController::class, 'create'])->name('admin.certificates.create');
    Route::post('/admin/certificates', [AdminCertificateController::class, 'store'])->name('admin.certificates.store');
    Route::get('/admin/certificates/{certificate}/edit', [AdminCertificateController::class, 'edit'])->name('admin.certificates.edit');
    Route::put('/admin/certificates/{certificate}', [AdminCertificateController::class, 'update'])->name('admin.certificates.update');
    Route::delete('/admin/certificates/{certificate}', [AdminCertificateController::class, 'destroy'])->name('admin.certificates.destroy');
    // Projects
    Route::get('/admin/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('admin/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
    // Contact
    Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::post('/admin/contact', [AdminContactController::class, 'store'])->name('admin.contact.store');
    Route::delete('/contact/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

require __DIR__ . '/auth.php';
