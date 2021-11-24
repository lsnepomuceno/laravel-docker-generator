<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

trait SetDB
{
    private function setDataBaseDriver(): self
    {
        $db = $this->choice(
            'Which version of PHP do you want to use?',
            [1 => 'PostgreSQL', 2 => 'MySQL'],
            1
        );

        if ($db === 'PostgreSQL') {
            $this->setPostgreVersion();
        } else {
        }

        return $this;
    }

    private function setPostgreVersion(): self
    {
        $version = $this->choice(
            'Which version of PostgreSQL do you want to use?',
            [
                1 => '12.9-alpine',
                2 => '13.5-alpine',
                3 => '14.1-alpine',
                4 => 'Latest'
            ],
            3
        );

        $this->processImages->db = [
            'drive'   => 'PostgreSQL',
            'version' => $version
        ];

        return $this;
    }
}
