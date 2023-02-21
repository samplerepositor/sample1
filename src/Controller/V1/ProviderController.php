<?php

declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AbstractController;
use App\Dto\Message\BadRequestError;
use App\Dto\Message\NotFoundError;
use App\Dto\Message\ValidationError;
use App\Dto\Request\Provider\ProviderRequest;
use App\Dto\Response\Provider\ProviderResponse;
use App\Exception\InvalidUrlFormatException;
use App\Exception\ProviderAlreadyExistsException;
use App\Exception\ProviderNotFoundException;
use App\Service\ProviderServiceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

#[Rest\Route('/provider')]
class ProviderController extends AbstractController
{
    public function __construct(private ProviderServiceInterface $providerService)
    {
    }

    #[Rest\Post, ParamConverter('providerRequest', converter: 'fos_rest.request_body')]
    public function create(ProviderRequest $providerRequest, ConstraintViolationListInterface $validationErrors): Response
    {
        if ($validationErrors->count() > 0) {
            return $this->errorResponse(new ValidationError($validationErrors));
        }

        try {
            $provider = $this->providerService->add($providerRequest->name, $providerRequest->url);
        } catch (InvalidUrlFormatException|ProviderAlreadyExistsException $e) {
            return $this->errorResponse(new BadRequestError($e));
        }

        return $this->successResponse(new ProviderResponse($provider));
    }

    #[Rest\Delete('/{providerName}')]
    public function remove(string $providerName): Response
    {
        try {
            $provider = $this->providerService->remove($providerName);
        } catch (ProviderNotFoundException $e) {
            return $this->errorResponse(new NotFoundError($e));
        }

        return $this->successResponse(new ProviderResponse($provider));
    }
}
