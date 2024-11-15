<div class="container mt-5">
    <h1 class="text-center mb-4">My Courses</h1>

    @if ($courses->isEmpty())
        <div class="alert alert-info text-center">No courses available at the moment.</div>
    @else
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ \Str::limit($course->description, 100) }}</p>

                                <button class="btn btn-secondary w-100" disabled>Enrolled</button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
