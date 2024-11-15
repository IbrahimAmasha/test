<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm text-center">
                <div class="card-body p-5">
                    <h2 class="card-title font-weight-bold mb-4">
                        {{ __('messages.welcome_back') . ' ' . auth()->user()->name . ' !' }}
                    </h2>
                    <p class="text-muted">{{ __('messages.glad_to_see_you') }}</p>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->role_id == 1)
        <div class="row mt-5">
            <!-- Roles Stat -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="circle bg-primary text-white mx-auto mb-3">
                            <i class="fas fa-users-cog fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold">{{ __('messages.roles') }}</h5>
                        <p class="text-muted">{{ App\Models\Role::count() }} {{ __('messages.total_roles') }}</p>
                    </div>
                </div>
            </div>

            <!-- Permissions Stat -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="circle bg-success text-white mx-auto mb-3">
                            <i class="fas fa-lock fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold">{{ __('messages.permissions') }}</h5>
                        <p class="text-muted">{{ App\Models\Permission::count() }}
                            {{ __('messages.total_permissions') }}</p>
                    </div>
                </div>
            </div>

            <!-- Courses Stat -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <div class="circle bg-info text-white mx-auto mb-3">
                            <i class="fas fa-book fa-2x"></i>
                        </div>
                        <h5 class="font-weight-bold">{{ __('messages.Courses') }}</h5>
                        <p class="text-muted">{{ App\Models\Course::count() }} </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-5">
        <!-- Total Students Stat -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="circle bg-warning text-white mx-auto mb-3">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h5 class="font-weight-bold">{{ __('messages.Students') }}</h5>
                    <p class="text-muted">{{ App\Models\Student::count() }} </p>
                </div>
            </div>
        </div>

        <!-- Total Trainers Stat -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="circle bg-danger text-white mx-auto mb-3">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h5 class="font-weight-bold">{{ __('messages.Trainers') }}</h5>
                    <p class="text-muted">{{ App\Models\Trainer::count() }} </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="circle bg-danger text-white mx-auto mb-3">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h5 class="font-weight-bold">{{ __('messages.Total Users') }}</h5>
                    <p class="text-muted">{{ App\Models\User::count() }} </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Users Stat -->

</div>
</div>
