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
                            <h1 class="h4 text-gray-900 mb-4">Login Account!</h1>
                        </div>
                        <div class="col-12">
                            <?php if(session()->getFlashdata('msg')):?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong><?= session()->getFlashdata('msg') ?>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif;?>
    
                        </div>
                        <form class="user" action="login_user" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="nipd" class="form-control" id="exampleFirstName" placeholder="N I P D" value="<?= set_value('nipd') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputEmail" placeholder="Password">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 text-center mt-1">
                                    <button type="submit" class="btn btn-primary btn-block">Masuk Akun</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="register">Belum punya akun? Daftar!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>