@extends('layouts.admin')
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

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Хэрэглэгчийн удирдлага</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Хэрэглэгчийн удирдлага</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="col-lg-12">
                    <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                            <form name="account_edit_form"  enctype="multipart/form-data" action="{{route('admin.user.update')}}" class="form-new-product form-style-1 needs-validation">
                                @csrf
                                @method('PUT')
                                <fieldset class="name">
                                    <div class="body-title">Нэр <span class="tf-color-1">*</span>
                                    </div>
                                    <input class="flex-grow" type="text" placeholder="Нэр"
                                        name="name" tabindex="0" value="" aria-required="true"
                                        required="">
                                </fieldset>

                                <fieldset class="name">
                                    <div class="body-title">Утас <span
                                            class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Утас"
                                        name="mobile" tabindex="0" value="" aria-required="true"
                                        required="">
                                </fieldset>

                                <fieldset class="name">
                                    <div class="body-title">И-Мэйл хаяг <span
                                            class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="И-Мэйл хаяг"
                                        name="email" tabindex="0" value="" aria-required="true"
                                        required="">
                                </fieldset>

                                <fieldset class="name">
                                    <div class="body-title">Хэрэглэгчийн төрөл <span
                                            class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Хэрэглэгчийн төрөл"
                                        name="utype" tabindex="0" value="" aria-required="true"
                                        required="">
                                </fieldset>

                                <div class="col-md-12">
                                    <div class="my-3">
                                        <button type="submit"
                                            class="btn btn-primary tf-button w208">Хадгалах</button>
                                    </div>
                                </div>
                            </form>
                            <form name="account_edit_form"  enctype="multipart/form-data" action="{{route('admin.user.update')}}" class="form-new-product form-style-1 needs-validation">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <h5 class="text-uppercase mb-0">Нууц үг өөрчлөх</h5>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Шинэ нууц үг <span
                                                    class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="password"
                                                placeholder="New password" id="new_password"
                                                name="new_password" aria-required="true"
                                                required="">
                                        </fieldset>

                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Нууц үг давтаж оруулах <span
                                                    class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="password"
                                                placeholder="Confirm new password" cfpwd=""
                                                data-cf-pwd="#new_password"
                                                id="new_password_confirmation"
                                                name="new_password_confirmation"
                                                aria-required="true" required="">
                                            <div class="invalid-feedback">Passwords did not match!
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button type="submit"
                                                class="btn btn-primary tf-button w208">Хадгалах </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection