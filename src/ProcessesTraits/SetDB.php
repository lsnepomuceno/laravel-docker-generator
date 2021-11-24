<?php

namespace Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits;

trait SetDB
{
    /**
     * Define a database drive
     *
     * @return self
     */
    private function setDataBaseDriver(): self
    {
        $db = $this->choice(
            'Which version of PHP do you want to use?',
            [1 => 'PostgreSQL', 2 => 'MySQL'],
            1
        );

        return $db === 'PostgreSQL'
            ? $this->setPostgreVersion()
            : $this->setMySQLVersion();
    }

    /**
     * Define a PostgreSQL image version
     *
     * @return self
     */
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
            'drive'   => 'postgres',
            'version' => strtolower($version)
        ];

        return $this;
    }

    /**
     * Define a MySQL image version
     *
     * @return self
     */
    private function setMySQLVersion(): self
    {
        $version = $this->choice(
            'Which version of MySQL do you want to use?',
            [
                1 => '5.7',
                2 => '8.0',
                3 => 'Latest'
            ],
            2
        );

        $this->processImages->db = [
            'drive'   => 'mysql',
            'version' => strtolower($version)
        ];

        return $this;
    }
}
