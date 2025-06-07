<?php

/**
 * PHPMailer Exception class.
 * PHP Version 5.5.
 *
 * @see https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 *
 * @author Marcus Bointon (Synchro/coolbru)
 * @author Jim Jagielski (jimjag)
 * @author Andy Prevost (codeworxtech)
 *
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

namespace PHPMailer\PHPMailer;

/**
 * PHPMailer exception handler.
 *
 * @author Marcus Bointon <phpmailer@synchromedia.co.uk>
 */
class Exception extends \Exception
{
    /**
     * Prettify error message output.
     *
     * @return string
     */
    public function errorMessage()
    {
        return '<strong>' . htmlspecialchars($this->getMessage()) . "</strong><br>\n";
    }
}
