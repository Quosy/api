<?php

/**
 * User: Houziaux mike : jenaye : mike@les-tilleuls.coop.
 */

declare(strict_types=1);

namespace App\Serializer;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class UserNormalizer implements NormalizerInterface, DenormalizerInterface
{
    private $passwordEncoder;
    private $decorated;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, NormalizerInterface $decorated)
    {
        if (!$decorated instanceof DenormalizerInterface) {
            throw new \InvalidArgumentException('The normalizer must implement the DenormalizerInterface');
        }

        $this->passwordEncoder = $passwordEncoder;
        $this->decorated = $decorated;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (is_a($class, User::class, true) && array_key_exists('password', $data)) {
            $plainPassword = $data['password'];
            unset($data['password']);
        }

        $object = $this->decorated->denormalize($data, $class, $format, $context);

        if ($object instanceof User && isset($plainPassword)) {
            $hashedPassword = $this->passwordEncoder->encodePassword($object, $plainPassword);
            $object->setPassword($hashedPassword);
        }

        return $object;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $this->decorated->supportsDenormalization($data, $type, $format);
    }

    public function normalize($object, $format = null, array $context = [])
    {
        return $this->decorated->normalize($object, $format, $context);
    }

    public function supportsNormalization($data, $format = null)
    {
        return $this->decorated->supportsNormalization($data, $format);
    }
}
