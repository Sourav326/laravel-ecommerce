<html>
<head>
  <meta charset="utf-8">
  <title>Ecommerce:Registration</title>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/loginstyle.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="formbg-outer Padding-top--48 padding-bottom--24">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Create your account</span>
              <form id="stripe-login" action="{{ route('registration.post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="custom-flex">
                      <div class="field padding-bottom--24 width-45">
                        <label for="first_name">First Name</label>
                        <input class="border @error('first_name') input-error @enderror" type="text" name="first_name">
                      </div>
                      <div class="field padding-bottom--24 width-45">
                        <label for="last_name">Last Name</label>
                        <input class="border @error('last_name') input-error @enderror" type="text" name="last_name">
                      </div>
                  </div>
                  <div class="custom-flex">
                      <div class="field padding-bottom--24 width-45">
                        <label for="email">Email</label>
                        <input class="border @error('email') input-error @enderror" type="email" name="email">
                      </div>
                      <div class="field padding-bottom--24 width-45">
                        <label for="phone">Phone</label>
                        <input class="border @error('phone') input-error @enderror" type="text" name="phone">
                      </div>
                  </div>
                  <div class="custom-flex">
                      <div class="field padding-bottom--24 width-45">
                          <div class="grid--50-50">
                              <label for="password">Password</label>
                            </div>
                            <input class="border @error('password') input-error @enderror" type="password" name="password">
                        </div>
                        <div class="field padding-bottom--24 width-45">
                            <div class="grid--50-50">
                                <label for="confirmPassword">Confirm Password</label>
                                <div class="reset-pass">
                                    <a href="#">It must me same as password</a>
                                </div>
                            </div>
                            <input class="border" type="password" name="confirmPassword">
                        </div>
                    </div>
                    <div class="custom-flex">
                        <div class="field padding-bottom--24 width-45">
                          <label for="profile">Profile Image</label>
                          <input class="border @error('') input-error @enderror" type="file" name="profile">
                        </div>
                        <div class="field padding-bottom--24 width-45">
                          
                        </div>
                    </div>
                <div class="field padding-bottom--24">
                  <input class="border" type="submit" name="submit" value="Continue">
                </div>
                <div class="field">
                  <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                </div>
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Already have an account? <a href="{{route('login')}}">Login</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>