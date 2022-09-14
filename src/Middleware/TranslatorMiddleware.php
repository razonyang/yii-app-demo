<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Translator\TranslatorInterface;

final class TranslatorMiddleware implements MiddlewareInterface
{
    public function __construct(
        private TranslatorInterface $translator,
    )
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $params = $request->getQueryParams();
        $this->translator->setLocale($params['locale']);
        \Swoole\Coroutine::sleep(5);
        return $handler->handle($request);
    }
}
