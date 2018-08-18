<?php

namespace CrCms\Foundation\App\Http\Resources;

use CrCms\Foundation\App\Resources\Traits\HideTrait;
use CrCms\Foundation\App\Resources\Traits\IncludeTrait;
use Illuminate\Container\Container;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\Resource as BaseResource;
use Illuminate\Support\Collection;

class Resource extends BaseResource
{
    use IncludeTrait, HideTrait;

    /**
     * @param null $request
     * @return array
     */
    public function resolve($request = null)
    {
        $request = $request ?: Container::getInstance()->make('request');

        $data = $this->filterFields(
            $this->mergeIncludeData($request)
        );

        if (is_array($data)) {
            $data = $data;
        } elseif ($data instanceof Arrayable || $data instanceof Collection) {
            $data = $data->toArray();
        } elseif ($data instanceof \JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        return $this->filter((array)$data);
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function mergeIncludeData(Request $request): array
    {
        return array_merge(
            $this->parseIncludes($request),
            $this->toArray($request)
        );
    }

    /**
     * @param mixed $resource
     * @return ResourceCollection|AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        return new ResourceCollection($resource, get_called_class());
    }
}