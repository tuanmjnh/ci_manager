<?php

class Logged {

    public static function UserID() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVID;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function roles() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVRoles;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function account() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVAccount;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function password() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVPassword;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function password_salt() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVPasswordSalt;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function full_name() {
        try {
            if (isset($_SESSION['users']) && $_SESSION['users']->UVProperty_names != NULL) {
                $name = TMLib::SplitTrim($_SESSION['users']->UVProperty_names);
                return $name[0] . ' ' . $name[1];
            }
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function first_name() {
        try {
            if (isset($_SESSION['users']) && $_SESSION['users']->UVProperty_names != NULL) {
                $name = TMLib::SplitTrim($_SESSION['users']->UVProperty_names);
                return $name[0];
            }
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function last_name() {
        try {
            if (isset($_SESSION['users']) && $_SESSION['users']->UVProperty_names != NULL) {
                $name = TMLib::SplitTrim($_SESSION['users']->UVProperty_names);
                return $name[1];
            }
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function email() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVEmail;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function mobile() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVMobile;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function picture($size = '64') {
        try {
            if (isset($_SESSION['users']) && $_SESSION['users']->UVPicture != NULL && $_SESSION['users']->UVPicture != '')
                return TM_BASE_URL . $_SESSION['users']->UVPicture;
            return TM_BASE_URL . "assets/images/user_df_$size.png";
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function access() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVAccess;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function last_inf() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::SplitStr($_SESSION['users']->UVLastInf);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function create_date() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::FormatDate2($_SESSION['users']->UDCDate);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function update_date() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::FormatDate2($_SESSION['users']->UDUDate);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function last_login() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::FormatDate2($_SESSION['users']->UDLastLogin);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function last_change_password() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::FormatDate2($_SESSION['users']->UDlastChangePass);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function locked() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UDLocked == 1 ? FALSE : TRUE;;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function locked_by() {
        try {
            if (isset($_SESSION['users']))
                return $_SESSION['users']->UVLockedBy;
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

    public static function locked_date() {
        try {
            if (isset($_SESSION['users']))
                return TMLib::FormatDate2($_SESSION['users']->UDLockedDate);
            return NULL;
        } catch (Exception $exc) {
            return NULL;
        }
    }

}
