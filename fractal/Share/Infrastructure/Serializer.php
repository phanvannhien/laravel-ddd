<?php
declare(strict_types=1);

namespace Fractal\Share\Infrastructure;

class Serializer
{
    private $serializer;

    public function __construct()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }

    public function serialize($object, string $format = 'json')
    {
        return $this->serializer->serialize($object, $format);
    }

    public function deserialize($data, string $type, string $format)
    {
        return $this->serializer->deserialize($data, $type, $format);
    }
}
