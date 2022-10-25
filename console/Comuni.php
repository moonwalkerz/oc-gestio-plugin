<?php namespace MoonWalkerz\Gestio\Console;

use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

use MoonWalkerz\Gestio\Models\Comune;

use Carbon\Carbon;

class Comuni extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'gestio:comuni';

    /**
     * @var string The console command description.
     */
    protected $description = 'Importazione codici Comuni...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->output->writeln('Importazione Comuni...');
        $inputFileName = plugins_path().'/moonwalkerz/gestio/console/imports/elenco-comuni-italiani.xls';
        
        

        Comune::truncate();
/** Create a new Xls Reader  **/
        $reader = new Xls();
        $spreadsheet = $reader->load($inputFileName);
        $spreadsheet->setActiveSheetIndex(0);
        $worksheet = $spreadsheet->getActiveSheet();
        
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
	$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'


	 $bar=$this->output->createProgressBar($highestRow);
        //$highestColumnIndex = Coordinate::columnIndexFromString($highestColumn); 
//        $main_id=1000000;
  //      $parent_id=null;
        for ($row = 2; $row <= $highestRow; ++$row) {
         
            $bar->advance();

            $c =  Comune::firstOrNew(['cod_cat'=>$worksheet->getCellByColumnAndRow(19, $row)->getValue()]);

            $c->cod_reg = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $c->cod_ut = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $c->name = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
            $c->state = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
            $c->prov = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
            $c->cod_state = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
            $c->cod_cat = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
            $c->save();
         
        }   
        $this->output->writeln("      done      ");
    }
    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
