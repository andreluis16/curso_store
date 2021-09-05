<h1>Register</h1>
<form method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::$BASE_URL.'register_confirm'?>"> 

    <div>
        <label>Name</label>
        <input type="text" placeholder="your name" name="name"/>
    </div>
    <div>
        <label>Email</label>
        <input type="email" placeholder="your email" name="email"/>
    </div>
    <div>
        <label>Password</label>
        <input type="password" placeholder="your password" name="password"/>
    </div>
    <div>
        <label>Password Confirm</label>
        <input type="password" placeholder="your password" name="password_confirm"/>
    </div>
    <div>
        <label>Profile Picture</label>
        <input type="file" name="profile_picture">
    </div>
    <div>
        <label>Birth Date</label>
        <input type="date" placeholder="your password" name="birth_date"/>
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>