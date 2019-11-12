<?php
declare(strict_types=1);

namespace Fractal\Share\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static serialize($object, string $format)
 * @method static deserialize(string $data, string $type, string $format)
 */
class SerializerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'serializer';
    }
}
