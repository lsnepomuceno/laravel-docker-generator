<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

use Illuminate\Support\Str;

trait SetNetwork
{
    /**
     * Define a network name
     *
     * @return self
     */
    public function setNetwork(): self
    {
        $this->processImages->network = Str::slug($this->processImages->webserver['vh'], '_');
        return $this;
    }
}
