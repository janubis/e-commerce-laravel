@extends('layouts.app')
@section('content')
<style>
    .form-floating>.form-control.form-textarea{
        height: 200px;
    }
</style>
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">CONTACT US</h2>
      </div>
    </section>

    <hr class="mt-2 text-secondary " />
    <div class="mb-4 pb-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="contact-us container">
      <div class="mw-930">
        <div class="contact-us__form">
            <form name="contact-us-form" class="needs-validation" method="POST" action="{{ route('home.contact.add') }}">
                @csrf
                <h3 class="mb-5">Get In Touch</h3>
                <div style="display:none;">
                    <label for="my_email">Email (leave blank)</label>
                    <input type="text" id="my_email" name="my_email" />
                </div>
                <div class="form-floating my-4">
                <input type="text" class="form-control" name="name" placeholder="Name *" required=""  value="{{ old('name') }}">
                <label for="contact_us_name">Name *</label>
                <span class="text-danger"></span>
                </div>
                <div class="form-floating my-4">
                <input type="text" class="form-control" name="phone" placeholder="Phone *" required="" value="{{ old('phone') }}" >
                <label for="contact_us_name">Phone *</label>
                <span class="text-danger"></span>
                </div>
                <div class="form-floating my-4">
                <input type="email" class="form-control" name="email" placeholder="Email address *" required="" value="{{ old('email') }}">
                <label for="contact_us_name">Email address *</label>
                <span class="text-danger"></span>
                </div>
                <div class="form-floating my-4">
                <textarea class="form-control form-control_gray form-textarea" name="message" placeholder="Your Message" cols="30"
                    rows="80" required="">{{ old('message') }}</textarea>
                    <label for="contact_us_name">Write your text here *</label>
                <span class="text-danger"></span>
                </div>
                <div class="my-4">
                </div>
                <div class="my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            {{-- Render the reCAPTCHA JS --}}
            {!! NoCaptcha::renderJs() !!}
        </div>
      </div>
    </section>
</main>
@endsection