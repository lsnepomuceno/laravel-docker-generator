<?php

namespace Lsnepomuceno\LaravelDockerGenerator;

use Symfony\Component\Yaml\Yaml;
use Illuminate\Support\{Facades\File, Str};

class ValidateYmlFile extends Yaml
{
    private ?string $dockerComposeYmlFile = null;

    public function fromRootFolder(): bool
    {
        $files   = File::allFiles(app_path());

        foreach ($files as $file) {
            $currentFile = strtolower($file->getFilename());
            if (in_array($currentFile, ['docker-compose.yml', 'docker-compose.yaml'])) {
                $this->dockerComposeYmlFile = $file->getPathname();
            }
        }

        return !!$this->dockerComposeYmlFile;
    }
}
