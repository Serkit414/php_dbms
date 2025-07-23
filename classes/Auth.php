<?php 

/**
 * Authentication
 * 
 * Login and Logout
 */
class Auth {

    /**
     * Return the user authenticaton status
     * 
     * @return boolean true is a user is logged in, null otherwise
     */
    public static function isLoggedIn() {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }

    /**
     * Require the user to be logged in, stopping with an unauthorized message is not
     * 
     * @return void
     */
    public static function requireLogin() {
        if (! static::isLoggedIn()) {
            die("Unauthorized Access.");
        }
    }

    /**
     * Log in using the session
     * 
     * @return void
     */
    public static function login() {
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
    }

    /**
     * Log out using the session
     * 
     * @return void
     */
    public static function logout() {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '', 
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
    }
    public static function isAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
            return true;
        }else{
            return false;
        }
    }
}