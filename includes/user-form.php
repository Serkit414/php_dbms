<form method="post">

    <div>
        <label for="first_name">First name</label>
        <input name="first_name" id="first_name" placeholder="" value="<?= htmlspecialchars($user->first_name); ?>">
    </div>

    <div>
        <label for="last_name">Last name</label>
        <input name="last_name" id="last_name" placeholder="" value="<?= htmlspecialchars($user->last_name); ?>">
    </div>

    <div>
        <label for="email">Email</label>
        <input name="email" id="email" placeholder="" value="<?= htmlspecialchars($user->email); ?>">
    </div>

    <div>
        <label for="username">Username</label>
        <input name="username" id="username" placeholder="" value="<?= htmlspecialchars($user->username); ?>">
    </div>

    <div>
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_password" placeholder="" value="<?= htmlspecialchars($user->user_password); ?>">
    </div>

    

    <button>Submit</button>

</form>
