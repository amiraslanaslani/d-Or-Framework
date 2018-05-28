<?php
/**
 * User: Amir Aslan Aslani
 * Date: 5/25/18
 * Time: 10:53 PM
 */

namespace Dor\Util;

abstract class AbstractController
{
    const   CT_HTML = 'text/html',
            CT_JSON = 'application/json';

    public static function render($file,$params = array()){
        return Kernel::$twig->render($file,$params);
    }

    public function getResponse($render = '',$content_type = self::CT_HTML):Response{
        $response = new Response();
        $response->body = $render;
        $response->headers['Content-Type'] = $content_type;
        return $response;
    }

    public function getJsonResponse($data):Response{
        return $this->getResponse(
            json_encode($data),
            self::CT_JSON
        );
    }
}