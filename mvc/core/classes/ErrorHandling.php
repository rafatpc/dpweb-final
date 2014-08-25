<?php
namespace Core\Classes;

class ErrorHandling 
{
    public static function handler(\Exception $err)
    {
        if(ENV != 'development' && $err->getCode() === 404) {
            $errMsg = 'The requested page is not found.';
        } else {
            $errMsg = $err->getMessage();
        }
        self::show_msg($errMsg, $err->getCode());
        exit;
    }
    
    public static function show_msg($text, $error_num = 1, $template = FALSE)
    {
        $data['error'] = self::show_messages($error_num, $text);
        \View::make('general' . DIRECTORY_SEPARATOR . 'message', $data, $template);
        exit;
    }
    
    public static function show_messages($err_num, $text)
    {
            $error_num = array(
                    1	=> 'An Error Was Encountered',
                    2	=> 'Fatal Error',
                    3	=> 'Successfully',

                    200	=> 'OK',
                    201	=> 'Created',
                    202	=> 'Accepted',

                    300	=> 'Error 300:	Multiple Choices',
                    301	=> 'Error 301: Moved Permanently',
                    302	=> 'Error 302: Found',
                    304	=> 'Error 304: Not Modified',
                    305	=> 'Error 305: Use Proxy',
                    307	=> 'Error 307: Temporary Redirect',

                    400	=> 'Error 400: Bad Request',
                    401	=> 'Error 401: Unauthorized',
                    403	=> 'Error 403: Forbidden',
                    404	=> 'Error 404: Not Found',
                    405	=> 'Error 405: Method Not Allowed',
                    406	=> 'Error 406: Not Acceptable',
            );


            if(is_numeric($err_num))
            {
                    $title = @$error_num[$err_num];
                    
                    $error['title'] = ((isset($title)) ? $title : $error_num[1]);
                    $error['message'] = $text;
                    return $error;
            }
            else
            {
                    self::show_messages(400, 'Error type and number need to be only integer(numbers)!!!');
            }
    }
}
