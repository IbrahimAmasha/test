<div class="container mt-5">
    <h1 class="text-center mb-4">Your Courses</h1>

    @if(!$courses)
        <div class="alert alert-info text-center">You have not created any courses yet.</div>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ \Str::limit($course->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
