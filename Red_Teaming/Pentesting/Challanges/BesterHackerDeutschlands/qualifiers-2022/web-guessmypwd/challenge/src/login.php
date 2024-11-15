<?php

$username = 'steps';
$password = 'TeutoburgerCharlie';
$flag = 'DBH{0901b45b-66e1-4804-8f00-3ff5e23232a2}';
$inputUsername = $_POST['username'] ?? '';
$inputPassword = $_POST['password'] ?? '';
$wasLoginSent = isset($_POST['username']) || isset($_POST['password']);
$isUserValid = hash_equals($username, strtolower($inputUsername));
$isPassValid = hash_equals($password, $inputPassword);
$areCredentialsValid = $wasLoginSent ? ($isUserValid && $isPassValid) : null;

if ($wasLoginSent && !$areCredentialsValid) {
    http_response_code(401);
}

include 'header.php';

?>
<h1>Login</h1>
<?php if ($wasLoginSent && !$isUserValid) : ?>
    <div class="alert alert-danger pb-3" role="alert">
        Ungültiger Username
    </div>
<?php elseif ($wasLoginSent && $isUserValid && !$isPassValid) : ?>
    <div class="alert alert-danger pb-3" role="alert">
        Ungültiges Passwort
    </div>
<?php elseif ($wasLoginSent && $areCredentialsValid) : ?>
    <div class="alert alert-success pb-3" role="alert">
        Login korrekt.<br>
        Die wohlverdiente Flag: <b><?php echo $flag; ?></b>
    </div>
<?php endif; ?>
<?php if (!$wasLoginSent || $wasLoginSent && !$areCredentialsValid) : ?>
    <form method="post" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="" maxlength="18" data-validate="/A-Za-z/">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
<?php endif; ?>
<?php include 'footer.php'; ?>
