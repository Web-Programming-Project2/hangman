<?php
    //home page which includes: logins for registration and users
    include("common.php");
    top();
?>
    <div id = "home">
        <h1>Welcome!<h1>
            <ul>
                <li id = "homepage">    
                    <a href = "signup.php">
                        <img src = "hangicon.png" width = "50" height = "50" alt = "icon">
                        Sign up for a new account
                    </a>
                </li>
                <li id = "homepage">
                    <a href="login.php">
                        <img src ="noose.png" width = "50" height = "50" alt = "icon">
                        Login
                    </a>
                </li>
            </ul>
    </div>
</body>
</html>