<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="{{route('register')}}" mathod="POST">
        @csrf 
        <div>
            <label for="credential_for">Credential For</label>
            <input type="text" id="credential_for" name="credential_for" required placeholder="Name">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" name="email" required>
        </div>

        <div>
            <label for="url">URL</label>
            <input type="url" name="url" required id="url" placeholder="Website Name">
        </div>

        <div>
            <label for="ip">IP</label>
            <input type="text" name="ip_address" placeholder="e.g., 192.168.1.1" pattern="^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$">
        </div>

        <div>
            <label for="username">Username for server</label>
            <input type="text" name="username" required id="username">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        </div>

        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Re-enter the Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>