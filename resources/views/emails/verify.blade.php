<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div style="padding:25px;">
            <h2>Hey {{ $user->email }}, please verify your e-mail address!</h2>
            <p style="color:#444;">
                Someone (hopefully you) has used this email at Urbn. Please click the button <br />
                below to verify your ownership of this email for the account. You will not be <br />
                able to receive email notifications until you do so.

                <a href="{{ URL::to('auth/verify/' . $user->confirmation_code) }}" style="width:90px;text-align:center;margin-top:50px;display:block;background-color:#f66051;padding:10px;color:white;text-decoration:none;">
                    Verify Account
                </a>
            </p>
        </div>
    </body>
</html>