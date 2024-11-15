<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add a New Course</h3>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="createCourse">
                <!-- Course Name -->
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Course title</label>
                    <input 
                        type="text" 
                        id="title" 
                        class="form-control @error('title') is-invalid @enderror" 
                        wire:model="title" 
                        placeholder="Enter Course title">
                    @error('title') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Course Description -->
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        wire:model="description" 
                        placeholder="Enter Course Description"></textarea>
                    @error('description') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Trainer Selection -->
                <div class="form-group mb-3">
                    <label for="trainer_id" class="form-label">Assign Trainers</label>
                    <select 
                        id="trainer_id" 
                        class="form-select @error('trainer_id') is-invalid @enderror" 
                        wire:model="trainer_id" 
                        multiple>
                        @foreach (App\Models\Trainer::all() as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->user->name }}</option>
                        @endforeach
                    </select>
                    @error('trainer_id') 
                        <div class="invalid-feedback">{{ $message }}</div> 
                    @enderror
                    <small class="form-text text-muted">Hold Ctrl (or Command on Mac) to select multiple trainers.</small>
                </div>
                

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Create Course</button>
                </div>
            </form>

            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
</div>
