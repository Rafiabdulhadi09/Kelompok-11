<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <form action="{{ route('admin.dataUser.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <small>Leave blank to keep current password.</small><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>