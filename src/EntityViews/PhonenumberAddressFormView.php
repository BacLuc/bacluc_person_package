<?php
/**
 * Created by PhpStorm.
 * User: lucius
 * Date: 21.10.16
 * Time: 12:34
 */

namespace Concrete\Package\BaclucPersonPackage\Src\EntityViews;


use Concrete\Package\BasicTablePackage\Src\AbstractFormView;

class PhonenumberAddressFormView extends AbstractFormView
{
    public function getFormView ($form, $clientSideValidationActivated = true)
    {
        $variables = $this->getFilledVariables($clientSideValidationActivated);
        $html = "
    <div class='row'>
            " . $variables['id']['input'] . "
        <div class='row'>
                                       <div class = 'col-xs-12 col-sm-4'>
                                           <div class='row'>
                                               <div class='col-sm-12 col-md-3'>
                                                   <label>" . $variables['type']['label'] . "</label>
                                               </div>
                                               <div class='col-sm-12 col-md-9'>
                                                   " . $variables['type']['input'] . "
                                               </div>
                                           </div>
                                       </div>
                                       <div class = 'col-xs-12 col-sm-4'>
                                           <div class='row'>
                                               <div class='col-sm-12 col-md-3'>
                                                   <label>" . $variables['organisation']['label'] . "</label>
                                               </div>
                                               <div class='col-sm-12 col-md-9'>
                                                   " . $variables['organisation']['input'] . "
                                               </div>
                                           </div>
                                       </div>
                                       <div class = 'col-xs-12 col-sm-4'>
                                           <div class='row'>
                                               <div class='col-sm-12 col-md-3'>
                                                   <label>" . $variables['info']['label'] . "</label>
                                               </div>
                                               <div class='col-sm-12 col-md-9'>
                                                   " . $variables['info']['input'] . "
                                               </div>
                                           </div>
                                       </div>
                      </div>
                      
                      <div class='row'>
                                                  <div class = 'col-xs-12'>
                                                      <div class='row'>
                                                          <div class='col-sm-12 col-md-1'>
                                                              <label>" . $variables['phonenumber']['label'] . "</label>
                                                          </div>
                                                          <div class='col-sm-12 col-md-11'>
                                                              " . $variables['phonenumber']['input'] . "
                                                          </div>
                                                      </div>
                                                  </div>
                                                  
                                   </div>
        </div>
        
        ";

        return $html;
    }

}