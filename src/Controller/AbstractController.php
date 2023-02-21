<?php

declare(strict_types=1);

namespace App\Controller;

use App\Dto\Message\AbstractMessage;
use App\Dto\Response\AbstractResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController extends AbstractFOSRestController
{
    protected function successResponse(AbstractResponse $response): Response
    {
        $view = $this->view($response->toArray(), Response::HTTP_OK);

        return $this->handleView($view);
    }

    protected function errorResponse(AbstractMessage $message, ?int $code = null): Response
    {
        $data = [
            'code' => $code ?? $message->getCode(),
            'message' => (string) $message,
        ];
        $view = $this->view($data, $code ?? $message->getCode());

        return $this->handleView($view);
    }

    protected function emptyResponse(): Response
    {
        $view = $this->view(null, Response::HTTP_OK);

        return $this->handleView($view);
    }
}
