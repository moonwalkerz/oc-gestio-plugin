<?php namespace MoonWalkerz\Gestio\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use System\Classes\CombineAssets;

use MoonWalkerz\Gestio\Models\Customer;
use MoonWalkerz\Gestio\Models\Person;
use Response;

class Customers extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController',
        'Backend\Behaviors\ImportExportController'
    ];
    
    public $importExportConfig = 'config_import_export.yaml';

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
	public $relationConfig = 'config_relation.yaml';


    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MoonWalkerz.Gestio', 'main-menu-item', 'side-menu-item');
    }
    
    public function dashboard() {
        $styles = [
            '/moonwalkerz/gestio/assets/scss/dashboard.scss'
          ];
        $this->addCss(CombineAssets::combine($styles, plugins_path()));
        $this->addJs('/plugins/moonwalkerz/gestio/assets/js/jquery-easypiechart/jquery.easypiechart.min.js');
        $this->addJs('/plugins/moonwalkerz/gestio/assets/js/dashboard.js');
        $this->pageTitle="Cruscotto";


        $aziende=Customer::count();
        $clienti=Customer::where('client','=',true)->get()->count();
        
        $verified=Customer::where('verified','=',true)->get()->count();
        $controlled=Customer::where('controlled','=',true)->get()->count();

        if ($aziende>0) {
        $pcl = $clienti/$aziende * 100;
        $pve = $verified/$aziende * 100;
        $pco = $controlled/$aziende * 100;
        } else {
            $pcl=0;
            $pve=0;
            $pco=0;

        }
        $this->vars['aziende']=$aziende;
        $this->vars['clienti']=$clienti;
        $this->vars['verified']=$verified;
        $this->vars['controlled']=$controlled;
        $this->vars['pcl']=number_format($pcl,1);
        $this->vars['pve']=number_format($pve,1);
        $this->vars['pco']=number_format($pco,1);
       
    }



    public function tocsv() {

        $customers = Customer::All();

        $csv = "EMAL,FIRST_NAME\n";

        foreach($customers as $customer) {
            if (!empty ($customer->emails) ) {
                foreach ($customer->emails as $email) {
                    if (empty($email['email'])) continue;
                $csv.=$email['email'].",".$customer->name."\n";
                    //print $customername.",".$email;
                }
            }
        }

        return Response::make($csv);
    }



}
