<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div style="padding:25px;">
            <h2>Reset Password</h2>
            <p style="color:#444;">
                Did you forget your password? No problem, click the button below to set a new one.

                <a href="{{ URL::to('password/reset/' . $token) }}" style="width:90px;text-align:center;margin-top:50px;display:block;background-color:#f66051;padding:10px;color:white;text-decoration:none;">
                    Reset Password
                </a>
            </p>
        </div>
    </body>
</html>