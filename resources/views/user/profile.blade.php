@extends('layouts.app')

@section('content')
<style>
    .text-danger {
        font-size: initial;
        line-height: 36px;
    }

    .alert {
        font-size: initial;
    }
</style>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Хувийн мэдээлэл</h2>
        <div class="row">
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            <div class="col-lg-8">
                <div class="page-content my-account__edit">
                  <div class="my-account__edit-form">
                    <form name="account_edit_form" action="#" method="POST" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="my-3">
                              <h5 class="text-uppercase mb-0">Ерөнхий мэдээлэл</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control" placeholder="Full Name" name="name" value="" required="">
                            <label for="name">Нэр</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value=""
                              required="">
                            <label for="mobile">Утасны дугаар</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" value=""
                              required="">
                            <label for="account_email">И-мэйл хаяг</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="my-3">
                              <button type="submit" class="btn btn-primary">Хадгалах</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="my-3">
                            <h5 class="text-uppercase mb-0">Нууц үг өөрчлөх</h5>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="password" class="form-control" id="old_password" name="old_password"
                              placeholder="Old password" required="">
                            <label for="old_password">Хуучин нууц үг</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="password" class="form-control" id="new_password" name="new_password"
                              placeholder="New password" required="">
                            <label for="account_new_password">Шинэ нууц үг</label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-floating my-3">
                            <input type="password" class="form-control" cfpwd="" data-cf-pwd="#new_password"
                              id="new_password_confirmation" name="new_password_confirmation"
                              placeholder="Confirm new password" required="">
                            <label for="new_password_confirmation">Шинэ нууц үгээ давтан оруулна уу</label>
                            <div class="invalid-feedback">Нууц үг таарахгүй байна!</div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="my-3">
                            <button type="submit" class="btn btn-primary">Хадгалах</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection