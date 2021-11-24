<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

trait SetComposer
{
    /**
     * Define the latest Composer image version
     *
     * @return self
     */
    public function setComposer(): self
    {
        $this->processImages->composer = 'latest';
        return $this;
    }
}
