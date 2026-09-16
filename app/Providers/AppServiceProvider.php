<?php
namespace App\Providers;
use App\Models\Student;
use App\Policies\StudentPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider { public function register(): void {} public function boot(): void { Gate::policy(Student::class, StudentPolicy::class); } }
