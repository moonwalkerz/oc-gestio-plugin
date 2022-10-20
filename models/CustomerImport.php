<?php namespace MoonWalkerz\Gestio\Models;
use Log;
class CustomerImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];


    public function set(&$c,$key,$data) {
        if (array_key_exists($key,$data)) {
            $c->{$key}=$data[$key];
        }
    }

    public function importData($results, $sessionKey = null)
    {
        foreach ($results as $row => $data) {

         
            
          

            try {
                $c = new Customer;
                
                $this->set($c,'name',$data);
                $this->set($c,'vat',$data);
                $this->set($c,'cf',$data);
                $this->set($c,'city',$data);
                $this->set($c,'state',$data);
                $this->set($c,'region',$data);
                $this->set($c,'address',$data);
                /*$c->name =$data['name'];
                $c->vat =$data['vat'];
                $c->cf =$data['cf'];
                $c->city =$data['city'];
                $c->state =$data['state'];
                $c->region =$data['region'];
                $c->address =$data['address'];*/
                $c->phones =['0'=>[ 'number' =>$data['phone'],'rif'=>'']];
                $c->emails =['0'=>['email'=>$data['email']]];
                
                $this->set($c,'note',$data);
                $this->set($c,'pec',$data);
                $this->set($c,'sdi',$data);
  /*              
                $c->note =$data['note'];
                $c->pec =$data['pec'];
                $c->sdi =$data['sdi'];
*/
                $c->save();

                $this->logCreated();
            }
            catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }
    }
}