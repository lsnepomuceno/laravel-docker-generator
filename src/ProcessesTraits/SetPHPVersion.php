<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

trait SetPHPVersion
{
    /**
     * Define a PHP image version
     *
     * @return self
     */
    public function setPhpVersion(): self
    {
        $this->processImages->php = $this->choice(
            'Which version of PHP do you want to use?',
            [1 => '7.4-alpine', 2 => '8.0-alpine', 3 => '8.1-rc-alpine'],
            2
        );
        return $this;
    }
}
