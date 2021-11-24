<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

trait SetWebServer
{
    public function setWebServer(): self
    {
        $this->processImages->webServer = $this->choice(
            'Which web server do you want to use?',
            [1 => 'Apache 2', 2 => 'NGINX'],
            2
        );
        return $this;
    }
}
