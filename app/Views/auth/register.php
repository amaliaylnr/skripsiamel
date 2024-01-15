<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<section class="masthead" id="login">
    <div class="card o-hidden border-0 shadow-lg my-5 py-2">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="p-0">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register an Account!</h1>
                        </div>
                        <div class="col-12">
                            <?php if(isset($validation)):?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> <?= $validation->listErrors() ?>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif;?>
    
                        </div>
                        <form class="user" action="create_user" method="POST">
                            <div class="form-group row mb-4">
                                <div class="col-sm-12 mb-sm-0">
                                    <input type="text" name="nipd" class="form-control" id="exampleFirstName" placeholder="N I P D" value="<?= set_value('nipd') ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email Address" value="<?= set_value('email') ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="confirmpassword" class="form-control" id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 text-center mt-1">
                                    <button type="submit" class="btn btn-primary btn-block text-center">Daftar Akun</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login">Sudah punya akun? Masuk!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>