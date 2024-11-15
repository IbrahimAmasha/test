<div>
    <h2 class="mb-4">{{ __('messages.role_management') }}</h2>
    <button wire:click="addRole" class="btn btn-primary">{{ __('messages.add_new_role') }}</button>

    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoleModalLabel">{{ __('messages.add_new_role') }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveRole">
                        <div class="form-group">
                            <label for="roleName">{{ __('messages.role_name') }}</label>
                            <input type="text" id="roleName" class="form-control" wire:model="roleName" required>
                        </div>
                        <div class="form-group">
                            <label for="permissions">{{ __('messages.permissions') }}</label>
                            <select wire:model="permissions" class="form-control mb-2" multiple>
                                @foreach (App\Models\Permission::all() as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Role Modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">{{ __('messages.edit_role') }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateRole">
                        <div class="form-group">
                            <label for="roleName">{{ __('messages.role_name') }}</label>
                            <input type="text" id="roleName" class="form-control" wire:model="roleName" required>
                        </div>
                        <div class="form-group">
                            <label for="permissions">{{ __('messages.permissions') }}</label>
                            <select wire:model="permissions" class="form-control mb-2" multiple>
                                @foreach (App\Models\Permission::all() as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <!-- Responsive Table Wrapper to Allow Horizontal Scrolling -->
    <div class="table-responsive">
        <table class="table table-hover " style="width: 10%; max-width: 10px; min-width: 600px;">
            <thead>
                <tr>
                    <th>{{ __('messages.role_name') }}</th>
                    <th>{{ __('messages.permissions') }}</th>
                    <th>{{ __('messages.operations') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-secondary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <button wire:click="editRole({{ $role->id }})" class="btn btn-warning">{{ __('messages.edit') }}</button>
                            <button wire:click="deleteRole({{ $role->id }})" class="btn btn-danger">{{ __('messages.delete') }}</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $roles->links('pagination::bootstrap-4') }}

    <script>
        window.addEventListener('show-add-role-modal', event => {
            $('#addRoleModal').modal('show');
        });

        window.addEventListener('show-edit-role-modal', event => {
            $('#editRoleModal').modal('show');
        });

        window.addEventListener('hide-role-modal', event => {
            $('#addRoleModal').modal('hide');
            $('#editRoleModal').modal('hide');
        });

        $('#addRoleModal, #editRoleModal').on('hidden.bs.modal', function() {
            Livewire.emit('resetForm');
        });
    </script>
</div>
