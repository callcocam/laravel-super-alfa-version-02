<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DefaultCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:_dafault {name} {--force} {--inline} {--stub=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerar componente default livewire para modules';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $name = $this->argument('name');
        $this->call('livewire:_module',[
            'name'=>$name,
            'module'=> $this->argument('module'),
            '--force' => $this->option('force'),
            '--stub' => $this->option('stub'),
            '--inline' => $this->option('inline'),
        ]);

    }
}
