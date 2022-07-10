<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:_service {name} {module=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerar service http';


    protected $templateStub = 'table';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = Str::plural($this->argument('name'));
       

    }
     /**
     * @return string
     */
    public function getTemplateStub()
    {
        return sprintf('service.%s.stub', $this->templateStub);
    }

    public function classContents($inline = false)
    {
        $stubName = $this->getTemplateStub();

        if (File::exists($stubPath = base_path('stubs/' . $stubName))) {
            $template = file_get_contents($stubPath);
        } else {
            $template = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . $stubName);
        }

        if ($inline) {
            $template = preg_replace('/\[quote\]/', $this->wisdomOfTheTao(), $template);
        }
     
        return str_replace(
            ['[namespace]', '[model]', '[class]', '[view]', '[param]', '[routes]'],
            [ $this->classNamespace(),$this->model, $this->className(), $this->viewName(), Str::slug($this->model), $this->routes],
            $template
        );
    }
}
