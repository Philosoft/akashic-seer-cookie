<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CookieController
{
    /**
     * @Route("/test")
     */
    public function testCookie(): Response
    {
        $response = new Response();
        $response->headers->setCookie(
            Cookie::create('foo', 'bar')
                ->withExpires((new \DateTimeImmutable())->modify('+1 year'))
        );
        $content = "<html><body><h1>Why don't these cookies work?</h1></body></html>";
        $response->setContent($content);
        $response->headers->set('Content-Type', 'text/html');
        return $response;
    }
}