<?php

namespace Lsnepomuceno\LaravelDockerGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Fluent;
use Lsnepomuceno\LaravelDockerGenerator\ValidateYmlFile;
use Lsnepomuceno\LaravelDockerGenerator\ProcessesTraits\{SetDB, SetPHPVersion, SetWebServer};

class DockerGenerate extends Command
{
    use SetPHPVersion, SetDB, SetWebServer;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new Docker configuration for your application';

    /**
     * @var \Lsnepomuceno\LaravelDockerGenerator\ValidateYmlFile
     */
    private ValidateYmlFile $validateYmlFile;

    /**
     * @var Fluent
     */
    private Fluent $processImages;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->validateYmlFile      = new ValidateYmlFile;
        $this->processImages = new Fluent;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        if ($this->validateYmlFile->fromRootFolder()) {
            $continue = $this->choice(
                'Docker-compose.yml file exists, do you want to continue?',
                ['Yes', 'No'],
                0
            );
            dd($continue);
        } else {
            $this->defaultDockerComposeProcess();
        }
        return Command::SUCCESS;
    }

    private function defaultDockerComposeProcess()
    {
        $this->setWebServer()
            ->setPhpVersion()
            ->setDataBaseDriver();

        dd($this->processImages);
    }
}
