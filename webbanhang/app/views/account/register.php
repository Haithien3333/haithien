<?php include 'app/views/shares/header.php'; ?>


<?php if (isset($errors) && !empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $err): ?>
                <li class="text-danger"><?= htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card-body p-5 text-center">
    <form class="user" action="/webbanhang/account/save" method="post">
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input 
                    type="text" 
                    class="form-control form-control-user" 
                    id="username" 
                    name="username" 
                    placeholder="Username" 
                    required
                    value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" />
                <?php if (isset($errors['username'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($errors['username']); ?></small>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <input 
                    type="text" 
                    class="form-control form-control-user" 
                    id="fullname" 
                    name="fullname" 
                    placeholder="Full Name" 
                    required
                    value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" />
                <?php if (isset($errors['fullname'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($errors['fullname']); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input 
                    type="password" 
                    class="form-control form-control-user" 
                    id="password" 
                    name="password" 
                    placeholder="Password" 
                    required />
                <?php if (isset($errors['password'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($errors['password']); ?></small>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <input 
                    type="password" 
                    class="form-control form-control-user" 
                    id="confirmpassword" 
                    name="confirmpassword" 
                    placeholder="Confirm Password" 
                    required />
                <?php if (isset($errors['confirmPass'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($errors['confirmPass']); ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group text-center">
            <button class="btn btn-primary btn-icon-split p-3" type="submit">
                Register
            </button>
        </div>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
