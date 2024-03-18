@extends('layouts.main')

@section('css')
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->



<section class="heading-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-headings">
                    <h2>My Account</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="login-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="get-login">
                    <h5>Login</h5>
                    <div class="back-login">
                        <form>
                            <div class="form-group">
                                <label>Username or email address *</label>
                                <input type="email" name="email" class="form-control" placeholder=""
                                       required="">
                            </div>
                            <div class="form-group">
                                <label>Password *</label>
                                <input type="password" name="password" class="form-control" placeholder=""
                                       required="">
                            </div>

                            <iframe title="reCAPTCHA" width="304" height="78" role="presentation"
                                    name="a-lqaqesa8ta8o" frameborder="0" scrolling="no"
                                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                    src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lcc7jkoAAAAAHZd-wkvCYDWQL32StBWfGln3rsz&amp;co=aHR0cHM6Ly93d3cucHJvZmlsZXJhY2luZy5jb206NDQz&amp;hl=en&amp;v=QquE1_MNjnFHgZF4HPsEcf_2&amp;size=normal&amp;cb=j5jmzws4adsp"></iframe>

                            <div class="form-group">
                                <input type="checkbox" name="" id="">
                                <span> Remember me</span>
                            </div>

                            <button type="submit" class="btn btn-bustom">Log in</button>
                            <a href="lost-password.php">Lost your password?</a>
                        </form>
                    </div>

                    <h5>Register</h5>

                    <form>
                        <div class="form-group">
                            <label>Email address *</label>
                            <input type="email" name="email" class="form-control" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" placeholder=""
                                   required="">
                        </div>

                        <iframe title="reCAPTCHA" width="304" height="78" role="presentation"
                                name="a-lqaqesa8ta8o" frameborder="0" scrolling="no"
                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"
                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lcc7jkoAAAAAHZd-wkvCYDWQL32StBWfGln3rsz&amp;co=aHR0cHM6Ly93d3cucHJvZmlsZXJhY2luZy5jb206NDQz&amp;hl=en&amp;v=QquE1_MNjnFHgZF4HPsEcf_2&amp;size=normal&amp;cb=j5jmzws4adsp"></iframe>

                        <button type="submit" class="btn btn-bustom">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('js')
<script type="text/javascript"></script>
@endsection
