<div class="col-md-12">
    <label for="fullnameInput" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="fullnameInput" placeholder="Enter your name" value="{{ $user->name }}">
</div>
<div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ $user->email }}">
</div>

    <!-- Type -->
    <div class="col-md-12">
        <label for="typeSelect" class="form-label">Type</label>
        <select name="type" class="form-select" id="typeSelect">
            <option value="user" @if($user->type === 'user') selected @endif>User</option>
            <option value="admin" @if($user->type === 'admin') selected @endif>Admin</option>
        </select>
    </div>

    <!-- Status -->
    <div class="col-md-12">
        <label for="statusSelect" class="form-label">Status</label>
        <select name="status" class="form-select" id="statusSelect">
            <option value="active" @if($user->status === 'active') selected @endif>Active</option>
            <option value="inactive" @if($user->status === 'inactive') selected @endif>Inactive</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Confirmation Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Password Confirmation" >
    </div>
