<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class EditCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'livewire:_edit {name} {--force} {--inline} {--stub=edit}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gerar componente Edit livewire para modules';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = Str::plural($this->argument('name'));
        $this->call('livewire:_module',[
            'name'=>sprintf('%s/EditComponent', $name),
            '--force' => $this->option('force'),
            '--stub' => $this->option('stub'),
            '--inline' => $this->option('inline'),
        ]);

    }
}
