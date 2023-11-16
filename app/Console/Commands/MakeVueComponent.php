<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeVueComponent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:vue {nome}';
    protected $description = 'Cria um novo componente Vue.js';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nome = $this->argument('nome');
        $path = base_path('app/View/Components/' . $nome . '.vue');

        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        if (!file_exists($path)) {
            $content = <<<EOT
                        <template>

                        </template>

                        <script>
                        export default {

                        }
                        </script>
                        EOT;
            file_put_contents($path, $content);
            $this->info("Arquivo {$nome}.vue criado com sucesso.");
        } else {
            $this->error("Arquivo {$nome}.vue já existe.");
        }
    }
}
