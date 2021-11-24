<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

use Illuminate\Support\Str;

trait SetWebServerAndVhost
{
    /**
     * Define a webserver type and vhost domain
     *
     * @return self
     */
    public function setWebServerAndVhost(): self
    {
        $webserver = $this->choice(
            'Which web server do you want to use?',
            [1 => 'Apache', 2 => 'NGINX'],
            2
        );

        $defaultVhostSlug = Str::slug(config('app.name'), '_');
        $vhostDomain = $this->ask(
            'What is the domain of the virtual host?',
            "{$defaultVhostSlug}.dev"
        );
        $vhostDomain = preg_replace(
            '/https?:\/\/|\/|\\\\|[^0-9a-zA-Z-_.]+/',
            '',
            $vhostDomain
        );

        $this->processImages->webserver = [
            'ws' => strtolower($webserver),
            'vh' => strtolower($vhostDomain)
        ];

        return $this;
    }
}
