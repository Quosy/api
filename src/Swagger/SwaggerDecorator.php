<?php
// http://localhost:8000/api/docs.json?api_gateway=true

namespace App\Swagger;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SwaggerDecorator implements NormalizerInterface
{
private $decorated;

public function __construct(NormalizerInterface $decorated)
{
$this->decorated = $decorated;
}

public function normalize($object, $format = null, array $context = [])
{
    $docs = $this->decorated->normalize($object, $format, $context);

    $docs['info']['title'] = 'Quosy api';
    $docs['info']['version'] = '1.0.1';
    $docs['basePath'] = 'http://localhost:8000/api';
    $docs['info']['description'] = 'This is open API made with <3 by [Jenaye](https:\/\/twitter.com/Jenaye_fr)';

    $usernameDefinition = [
    'name' => 'username',
    'definition' => 'you\'re username',
    'default' => 'string',
    ];

    $passwordDefinition2 = [
        'name' => 'password',
        'definition' => 'you\'re password',
        'default' => 'string',
    ];

    $docs['paths']['/login']['post']['parameters'][] = $usernameDefinition;
    $docs['paths']['/login']['post']['parameters'][] = $passwordDefinition2;

    return $docs;
}

public function supportsNormalization($data, $format = null) {
    return $this->decorated->supportsNormalization($data, $format);
}

}
