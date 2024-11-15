 
<div class="container mt-5">
    <h2 class="mb-4">Available Courses</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($courses->isNotEmpty())
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p>
                                <strong>Trainers:</strong>
                                {{ $course->trainers->pluck('user.name')->join(', ') }}
                            </p>
                            <button 
                                wire:click="enroll({{ $course->id }})" 
                                class="btn btn-primary">
                                Enroll
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No courses available at the moment.</div>
    @endif
</div>
