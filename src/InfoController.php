<?php

declare(strict_types=1);

namespace App;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use OpenApi\Annotations as OA;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @OA\Info(title="Yii API application", version="1.0")
 */
class InfoController
{
    /**
     * @OA\Get(
     *     path="/",
     *     summary="Returns info about the API",
     *     description="",
     *     @OA\Response(
     *          response="200",
     *          description="Success",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(ref="#/components/schemas/Response"),
     *                  @OA\Schema(
     *                      @OA\Property(
     *                          property="data",
     *                          type="object",
     *                          @OA\Property(
     *                              property="version",
     *                              type="string",
     *                              example="3.0"
     *                          ),
     *                          @OA\Property(
     *                              property="author",
     *                              type="string",
     *                              example="yiisoft"
     *                          ),
     *                      ),
     *                  ),
     *              },
     *          )
     *    ),
     * )
     */
    public function index(
        TranslatorInterface $translator, 
        ServerRequestInterface $request, 
        DataResponseFactoryInterface $responseFactory
    ): ResponseInterface
    {
        $params = $request->getQueryParams();
        $locale = $translator->getLocale();
        if ($locale !== $params['locale']) {
            throw new RuntimeException('Translator locale was changed by other coroutines.');
        }
        return $responseFactory->createResponse(['version' => '3.0', 'author' => 'yiisoft', 'locale' => $locale]);
    }
}
